<?php

    class Config {

        private $host = '127.0.0.1';
        private $username = 'root';
        private $password = '';

        private $db_name = 'exam';

        private $admin_table = 'admin';
        private $item_table = 'items';
        private $user_table = 'user';

        private $con;

        public function __construct() {

            $this->con = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

            if($this->con) {
            } else {
                echo "Serever Not Connected...";
            }

        }

        public function register_user_admin($email, $password) {

            $query = "INSERT INTO $this->admin_table (email, password) VALUES ('$email', '$password')";

            return mysqli_query($this->con, $query);

        }

        public function insert_items($name, $price, $img, $path) {

            $query = "INSERT INTO $this->item_table(name, price, img, path) VALUES('$name', '$price', '$img', '$path')";

            return mysqli_query($this->con, $query);

        }

        public function update_item($id,$name,$price) {

            $query = "UPDATE $this->item_table SET name='$name',price=$price WHERE Id=$id";

            return mysqli_query($this->con,$query);

        }

        public function get_all_item() {

            $query = "SELECT * FROM $this->item_table";

            return mysqli_query($this->con,$query);

        }

        public function delete_item($id) {

            $query = "DELETE FROM $this->item_table WHERE $id";

            return mysqli_query($this->con,$query);

        }

    }

?>