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
            switch ($choice) {

                case '1':
                    echo "Department name: ";
                    $name = trim(fgets(STDIN));
                    $departments = new Department(NULL, $name, "departments");
                    $this->departments->create($departments);
                    echo "Created.\n";
                    break;

                case '2':
                    print_r($this->departments->read("id,name", "departments"));
                    break;

                case '3':
                    print_r($this->departments->read("id,name", "departments"));
                    echo "ID: "; $id = trim(fgets(STDIN));
                    echo "New name: "; $name = trim(fgets(STDIN));
                    $departments = new Department($id, $name, "departments");
                    $this->departments->update($departments);
                    echo "Updated.\n";
                    break;

                case '4':
                    print_r($this->departments->read("id,name", "departments"));
                    echo "ID: "; $id = trim(fgets(STDIN));
                    $this->departments->delete("id= ". $id, "departments");
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
