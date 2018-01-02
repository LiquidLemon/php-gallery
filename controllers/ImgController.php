<?php
require_once '../models/Img.php';
require_once '../views/LayoutView.php';
require_once '../views/RedirectView.php';

class ImgController {
  public function new() {
    return new LayoutView('imgnew');
  }

  public function add() {
    $valid = true;

    $author = post('author');
    if ($author == '') {
      $valid = false;
      Flash::error("Author can't be empty");
    }

    $title = post('title');
    if ($title == '') {
      $valid = false;
      Flash::error("Title can't be empty");
    }

    $watermark = post('watermark');
    if ($watermark == '') {
      $valid = false;
      Flash::error("Watermark can't be empty");
    }

    if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
      $filePath = $_FILES['img']['tmp_name'];
      $type = mime_content_type($filePath);
      $format = explode('/', $type)[1];
      if ($format !== 'jpeg' && $format !== 'png') {
        $valid = false;
        Flash::error("\"{$type}\" is not an acceptable file type");
      }

      $fileSize = $_FILES['img']['size'];
      if ($fileSize > 1024 * 1024) {
        $valid = false;
        Flash::error("The image is too big (max 1 MB)");
      }
    } else {
      $valid = false;
      Flash::error("File can't be empty");
    }

    if ($valid) {
      $img = new Img($author, $title, $format);
      $img->save();
      $name = $img->id() . ".{$format}";
      $path = getcwd() . "/images/{$name}";
      if (!rename($filePath, $path)) {
        Flash::error("Couldn't save file");
      }

      Flash::info('Image added');
    }

    return new RedirectView('/img/new', 303);
  }
}
