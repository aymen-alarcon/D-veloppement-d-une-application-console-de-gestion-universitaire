<?php
interface CrudInterface {
    public function create($student);
    public function read($condition, $table);
    public function update($student);
    public function delete($condition, $table);
}
