<?php
class Pics
{
	private $db;
	private $_error = "No hay error";

	private $_uid;
	private $_pic_info = array();

	public function __construct ($db) {
		$this->db = $db;
		$this->db->setTable('pictures');
	}

	public function error (){
		return $this->_error;
	}

	public function exist ($who) {
		$db = $this->db;
		$consult["where"] = "`md5` = '{$who}'";
		$n = $db->count($consult);
		if ($n > 0) return true;
		return false;
	}

	public function setPic ($md5) {
		if ($this->exist($md5)) {
			$db = $this->db;
			$consult["where"] = "`md5` = '{$md5}'";
			$result = $db->select($consult);

			$colors = explode(';', $result[0]["colors"]);
			$result[0]["colors"] = $colors;

			$uri = $result[0]["url"];
			$result[0]["pictures"] = array(
				"original" => "http://localhost/manageme/pictures/{$uri}",
				"large" => "http://localhost/manageme/pictures/large/{$uri}",
				"medium" => "http://localhost/manageme/pictures/medium/{$uri}",
				"normal" => "http://localhost/manageme/pictures/normal/{$uri}",
				"small" => "http://localhost/manageme/pictures/small/{$uri}",
				"thumb" => "http://localhost/manageme/pictures/thumb/{$uri}",
				"sq" => "http://localhost/manageme/pictures/sq/{$uri}",
				"sqm" => "http://localhost/manageme/pictures/sqm/{$uri}"
			);

			return $this->_pic_info = (object) $result[0];
		} else {
			$this->_error = "La imagen no existe";
			return false;
		}
	}
	public function getInfo ($md5 = null) {
		if ($md5) {
			return $this->setUser($md5);
		} else if (empty($this->_pic_info)) {
			$this->_error = "No se ha seleccionado la imagen";
			return false;
		} else {
			return $this->_pic_info;
		}
	}

	public function upload ($pic) {
		set_time_limit ( 3600 );
		if (isset($pic['error']) && $pic['error'] != UPLOAD_ERR_OK) {
			 switch ($pic['error']) {
				case UPLOAD_ERR_NO_FILE:
					$this->_error = "No se envió el archivo";
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					$this->_error = "El archivo es demasiado pesado";
				default:
					$this->_error = "Error desconocido durante la subida del archivo";
			}
			return false;
		} else {
			$ext = explode('.', $pic['name']);
				$ext = end($ext);
				$ext = strtolower($ext);
			$uid = uniqid();
			$md5 = md5_file($pic['tmp_name']);
			$uri = "{$uid}_{$md5}.{$ext}";
			$filename = "pictures/" . $uri;
			$up = move_uploaded_file( $pic['tmp_name'], $filename );

			if (!$up) {
				$this->_error = "No se obtuvo la imagen";
				return false;
			} else {
				if ($this->exist($md5)) {
					$this->_error = "La imagen ya existe";
					unlink($filename);
					$this->setPic($md5);
					return false;
				} else {
					$infPic = getimagesize($filename);
					$mime = $infPic['mime'];
					list($width, $height) = $infPic;

					$imgColors = $this->colorPalette($filename, 5);
					$colors = implode(";", $imgColors);

					$author = isset($_COOKIE['user']) ? $_COOKIE['user'] : "anon";
					$oldname = $pic['name'];
					$newPic = array (
						'md5' => $md5,
						'url' => $uri,
						'author' => $author,
						'oldname' => $oldname,
						'width' => $width,
						'height' => $height,
						'colors' => $colors,
						'mimetype' => $mime
					);

					if ($width >= 1280) {
						$this->gensize($filename, "pictures/large/{$uri}", 1280);
					} else {
						$this->gensize($filename, "pictures/large/{$uri}", $width);
					}
					if ($width >= 960) {
						$this->gensize($filename, "pictures/normal/{$uri}", 960);
					} else {
						$this->gensize($filename, "pictures/normal/{$uri}", $width);
					}
					if ($width >= 640) {
						$this->gensize($filename, "pictures/medium/{$uri}", 640);
					} else {
						$this->gensize($filename, "pictures/medium/{$uri}", $width);
					}
					if ($width >= 320) {
						$this->gensize($filename, "pictures/small/{$uri}", 320);
					} else {
						$this->gensize($filename, "pictures/small/{$uri}", $width);
					}
					if ($width >= 160) {
						$this->gensize($filename, "pictures/thumb/{$uri}", 160);
					} else {
						$this->gensize($filename, "pictures/thumb/{$uri}", $width);
					}
			
					$this->genthumb($filename, "pictures/sq/{$uri}", 256);
					$this->genthumb($filename, "pictures/sqm/{$uri}", 64);

					$db = $this->db;
					$ins = $db->insert($newPic);

					if (!$ins) {
						$this->_error = "No se pudo registrar imagen";
						unlink($filename);
						return false;
					} else {
						$this->setPic($md5);
						return true;
					}
				}
			}
		}
	}

	public function listPics ($consult = array()) {
		$db = $this->db;
		return $db->select($consult);
	}

	public function colorPalette ($imageFile, $numColors, $granularity = 5) {
		$granularity = max(1, abs((int) $granularity));
		$colors = array();
		$size = @getimagesize($imageFile);

		if ($size === false) {
			return false;
		}
		$img = @imagecreatefromstring(file_get_contents($imageFile));
		if (!$img) {
			return false;
		}

		for ($x = 0; $x < $size[0]; $x += $granularity) {
			for ($y = 0; $y < $size[1]; $y += $granularity) {
				$thisColor = imagecolorat($img, $x, $y);
				$rgb = imagecolorsforindex($img, $thisColor);

				$red = round(round(($rgb['red'] / 0x33)) * 0x33);
				$green = round(round(($rgb['green'] / 0x33)) * 0x33);
				$blue = round(round(($rgb['blue'] / 0x33)) * 0x33);
				$thisRGB = sprintf('%02X%02X%02X', $red, $green, $blue);

				if (array_key_exists($thisRGB, $colors)) {
					$colors[$thisRGB]++;
				} else {
					$colors[$thisRGB] = 1;
				}
			}
		}
		arsort($colors);
		return array_slice(array_keys($colors), 0, $numColors);
	}

	public function gensize ($img, $nimg = null, $size = 512) {
		header("Content-Type: image/jpeg");

		$infPic = getimagesize($img);
		$image_type = $infPic['mime'];
		list($width_o, $height_o) = $infPic;

		$ratio_o = $height_o / $width_o;
		$width = $size;
		$height = $size * $ratio_o;

		$image_p = imagecreatetruecolor( $width, $height );
		$image = null;

		$image_type = explode("/", $image_type);
			$image_type = end($image_type);
			$image_type = strtolower($image_type);
		switch ( $image_type ){
			case "jpeg": $image = imagecreatefromjpeg( $img ); break;
			case "png": $image = imagecreatefrompng( $img ); break;
			case "gif": $image = imagecreatefromgif( $img ); break;
			default: $image = imagecreatefromjpeg( $img ); break;
		}

		imagealphablending($image_p, true);
		imagesavealpha($image_p, true);
		imagecopyresampled( $image_p, $image, 0, 0, 0, 0, $width, $height, $width_o, $height_o );

		$nimg = $nimg != null ? $nimg : $img;
		imagejpeg($image_p, $nimg, 80);
		
		imagedestroy($image);
		imagedestroy($image_p);
	}
	public function genthumb ($img, $nimg = null, $size = 512) {
		header("Content-Type: image/jpeg");

		$infPic = getimagesize($img);
		$image_type = $infPic['mime'];
		list($width_o, $height_o) = $infPic;
		
		if ( $width_o > $height_o ) {
			$ratio_o = $width_o / $height_o;
			$height = $size;
			$width = $size * $ratio_o;
		} else {
			$ratio_o = $height_o / $width_o;
			$width = $size;
			$height = $size * $ratio_o;
		}

		$image_p = imagecreatetruecolor( $size, $size );
		$image = null;

		$image_type = explode("/", $image_type);
			$image_type = end($image_type);
			$image_type = strtolower($image_type);
		switch ( $image_type ){
			case "jpeg": $image = imagecreatefromjpeg( $img ); break;
			case "png": $image = imagecreatefrompng( $img ); break;
			case "gif": $image = imagecreatefromgif( $img ); break;
			default: $image = imagecreatefromjpeg( $img ); break;
		}

		imagealphablending($image_p, true);
		imagesavealpha($image_p, true);
		imagecopyresampled( $image_p, $image, 0, 0, 0, 0, $width, $height, $width_o, $height_o );

		$nimg = $nimg != null ? $nimg : $img;
		imagejpeg($image_p, $nimg, 100);
		
		imagedestroy($image);
		imagedestroy($image_p);
	}
}
