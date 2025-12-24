<?php

class DepartmentService {

    private DepartmentRepository $departments;

    public function __construct(PDO $conn) {
        $this->departments = new DepartmentRepository($conn);
    }

    public function departmentMenu() {
        while (true) {
            echo "\n=== Departments Menu ===\n";
            echo "1. Create Department\n";
            echo "2. List Departments\n";
            echo "3. Update Department\n";
            echo "4. Delete Department\n";
            echo "0. Back\n";
            echo "Choose an option: ";
            $choice = trim(fgets(STDIN));
            $this->departments->useTable("departments");
            switch ($choice) {

                case '1':
                    echo "Department name: ";
                    $name = trim(fgets(STDIN));
                    $this->departments->create($name);
                    echo "Created.\n";
                    break;

                case '2':
                    print_r($this->departments->read("id,name"));
                    break;

                case '3':
                    print_r($this->departments->read("id,name"));
                    echo "ID: "; $id = trim(fgets(STDIN));
                    echo "New name: "; $name = trim(fgets(STDIN));
                    $this->departments->update([$id,$name]);
                    echo "Updated.\n";
                    break;

                case '4':
                    print_r($this->departments->read("id,name"));
                    echo "ID: "; $id = trim(fgets(STDIN));
                    $this->departments->delete("id=".$id);
                    echo "Deleted.\n";
                    break;

                case '0':
                    return;

                default:
                    echo "Invalid option.\n";
            }
        }
    }
}
