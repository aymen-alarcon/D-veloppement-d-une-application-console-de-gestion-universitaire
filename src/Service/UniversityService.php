<?php
    class UniversityService {
        private StudentRepository $students;
        private DepartmentRepository $departments;
        private CourseRepository $courses;
        private FormateurRepository $formateurs;

        public function __construct(PDO $conn) {
            $this->departments = new DepartmentRepository($conn);
            $this->courses     = new CourseRepository($conn);
            $this->formateurs  = new FormateurRepository($conn);
            $this->students  = new StudentRepository($conn);
        }

        public function run() {
            while (true) {
                $this->showMainMenu();
            }
        }

        private function showMainMenu() {
            echo "\n=== University Management ===\n";
            echo "1. Departments\n";
            echo "2. Courses\n";
            echo "3. Formateurs\n";
            echo "4. Students\n";
            echo "0. Exit\n";
            echo "Choose an option: ";

            $choice = trim(fgets(STDIN));

            switch ($choice) {
                case '1':
                    $this->departmentMenu();
                    break;

                case '2':
                    $this->courseMenu();
                    break;

                case '3':
                    $this->formateurMenu();
                    break;

                case '4':
                    $this->studentMenu();
                    break;

                case '0':
                    echo "Goodbye!\n";
                    exit;

                default:
                    echo "Invalid option.\n";
            }
        }

        private function departmentMenu() {
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
                        $this->departments->create($name);
                        echo "Department created.\n";
                        break;

                    case '2':
                        print_r($this->departments->read("id, name"));
                        break;

                    case '3':
                        print_r($this->departments->read("id, name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        echo "New name: ";
                        $name = trim(fgets(STDIN));
                        $data = [];
                        array_push($data, $id, $name);
                        $this->departments->update($data);
                        echo "Department updated.\n";
                        break;

                    case '4':
                        print_r($this->departments->read("id, name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        $this->departments->delete("id = " . $id);
                        echo "Department deleted.\n";
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }

        private function courseMenu() {
            while (true) {
                echo "\n=== Courses Menu ===\n";
                echo "1. Create Course\n";
                echo "2. List Courses\n";
                echo "3. Update Course\n";
                echo "4. Delete Course\n";
                echo "0. Back\n";
                echo "Choose an option: ";

                $choice = trim(fgets(STDIN));

                switch ($choice) {

                    case '1':
                        echo "Course name: ";
                        $name = trim(fgets(STDIN));

                        print_r($this->departments->read("id, name"));
                        echo "Department ID: ";
                        $departmentId = trim(fgets(STDIN));

                        print_r($this->formateurs->read("id, first_name, last_name"));
                        echo "Formateur ID: ";
                        $formateurId = trim(fgets(STDIN));

                        $this->courses->create([
                            "name" => $name,
                            "department_id" => $departmentId,
                            "formateur_id" => $formateurId
                        ]);
                        echo "Course created.\n";
                        break;

                    case '2':
                        print_r($this->courses->read("id, name"));
                        break;
                    case '3':
                        print_r($this->courses->read("id, name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        echo "New name: ";
                        $name = trim(fgets(STDIN));
                        $data = [];
                        array_push($data, $id, $name);
                        $this->courses->update($data);
                        echo "Course updated.\n";
                        break;

                    case '4':
                        print_r($this->courses->read("id, name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        $this->courses->delete("id = " . $id);
                        echo "Course deleted.\n";
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }

        private function formateurMenu() {
            while (true) {
                echo "\n=== Formateurs Menu ===\n";
                echo "1. Create Formateur\n";
                echo "2. List Formateurs\n";
                echo "3. Update Formateur\n";
                echo "4. Delete Formateur\n";
                echo "0. Back\n";
                echo "Choose an option: ";

                $choice = trim(fgets(STDIN));

                switch ($choice) {
                    case '1':
                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $data = [
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "email"      => $email
                        ];
                        $this->formateurs->create($data);
                        echo "Formateur created.\n";
                        break;

                    case '2':
                        print_r($this->formateurs->read("id, first_name, last_name"));
                        break;

                    case '3':
                        print_r($this->formateurs->read("id, first_name, last_name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));

                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $data = [
                            "id" => $id, 
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "email"      => $email
                        ];
                        $this->formateurs->update($data);
                        echo "Formateur updated.\n";
                        break;

                    case '4':
                        print_r($this->formateurs->read("id, first_name, last_name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        $this->formateurs->delete("id = " . $id);
                        echo "Formateur deleted.\n";
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }

        private function studentMenu() {
            while (true) {
                echo "\n=== students Menu ===\n";
                echo "1. Create student\n";
                echo "2. List students\n";
                echo "3. Update student\n";
                echo "4. Delete student\n";
                echo "0. Back\n";
                echo "Choose an option: ";

                $choice = trim(fgets(STDIN));

                switch ($choice) {
                    case '1':
                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $data = [
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "email"      => $email
                        ];
                        $this->students->create($data);
                        echo "student created.\n";
                        break;

                    case '2':
                        print_r($this->students->read("id, first_name, last_name"));
                        break;

                    case '3':
                        print_r($this->students->read("id, first_name, last_name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));

                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $data = [
                            "id" => $id, 
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "email"      => $email
                        ];
                        $this->students->update($data);
                        echo "student updated.\n";
                        break;

                    case '4':
                        print_r($this->students->read("id, first_name, last_name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        $this->students->delete("id = " . $id);
                        echo "student deleted.\n";
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }
    }