<?php
    class FileUploader {
        //Member Variables
        private static $target_directory = "uploads/";
        private static $size_limit = 50000; //size given in bytes
        private $uploadOk = false;
        private $file_original_name;
        private $file_type;
        private $file_size;
        private $final_file_name;

        //getters and setters
        public function setOriginalNale ($name) {
            $this->file_original_name = $name;
        }
        public function getOriginalName(){
            return $this->file_original_name;
        }
        public function setFileType($type) {
            $this ->file_type = $type;
        }
        public function getFileType () {
            return $this->file_type;
        }
        public function setFileSize($size) {
            $this ->file_sie = $size;
        }
        public function getFileSize () {
            return $this->file_size;
        }
        public function setFinaleName ($final_name) {
            $this->final_file_name = $final_name;
        }
        public function getFinalFileName() {
            return $this->final_file_name;
        }
        //methods
        public function uploadFile(){}
        public function fileAlreadyExists(){}
        public function saveFilePathTo(){}
        public function moveFile(){}
        public function fileTypeIsCorrect(){}
        public function fileSizeIsCorrect(){}
        public function fileWasSelected(){}
    }
?>