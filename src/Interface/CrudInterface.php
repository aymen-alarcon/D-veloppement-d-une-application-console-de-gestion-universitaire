<?php
interface CrudInterface {
    public function create($data);
    public function read($condition);
    public function update($data);
    public function delete($condition);
}
