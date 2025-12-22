<?php
interface CrudInterface {
    public function create($id);
    public function read($id);
    public function update($id);
    public function delete($id);
}
