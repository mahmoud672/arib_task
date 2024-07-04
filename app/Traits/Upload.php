<?php

namespace App\Traits;

trait Upload
{

    /**
     * @var string
     */
    private $APP_DIR = 'uploads/';

    /**
     * @param $file
     * @param string $upload_path
     * @param bool $is_multiple
     * @return array|string
     */
    public function uploadFile($file,string $upload_path,bool $is_multiple = false)
    {
        if($is_multiple)
        {
            foreach ($file as $key => $document)
            {
                $file_name = time() . $key . $file->getClientOriginalName();
                $file_path = public_path($this->APP_DIR . $upload_path);
                $file->move($file_path, $file_name);
                $files_array[] = $this->APP_DIR . $upload_path . '/' . $file_name;
            }

            return $files_array;
        }
        $file_name = time().$file->getClientOriginalName();
        $file_path = public_path($this->APP_DIR.$upload_path);
        $file->move($file_path,$file_name);
        return $this->APP_DIR . $upload_path."/".$file_name;
    }

}
