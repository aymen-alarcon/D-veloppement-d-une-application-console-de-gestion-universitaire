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

        public function run(): void {
            while (true) {
                $this->showMainMenu();
            }
        }

        private function showMainMenu(): void {
            echo "\n=== University Management ===\n";
            echo "1. Departments\n";
            echo "2. Courses\n";
            echo "3. Formateurs\n";
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

                case '0':
                    echo "Goodbye!\n";
                    exit;

                default:
                    echo "Invalid option.\n";
            }
        }

        private function departmentMenu(): void {
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
                        $this->departments->create(["name" => $name]);
                        echo "Department created.\n";
                        break;

                    case '2':
                        print_r($this->departments->read("id, name", "departments"));
                        break;

                    case '3':
                        print_r($this->departments->read("id, name", "departments"));
                        echo "Enter ID: ";
                        $id = (int) trim(fgets(STDIN));
                        echo "New name: ";
                        $name = trim(fgets(STDIN));
                        $this->departments->update($id, ["name" => $name]);
                        echo "Department updated.\n";
                        break;

                    case '4':
                        print_r($this->departments->read("id, name", "departments"));
                        echo "Enter ID: ";
                        $id = (int) trim(fgets(STDIN));
                        $this->departments->delete($id);
                        echo "Department deleted.\n";
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }

        private function courseMenu(): void {
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

                        print_r($this->departments->read("id, name", "departments"));
                        echo "Department ID: ";
                        $departmentId = (int) trim(fgets(STDIN));

                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        echo "Formateur ID: ";
                        $formateurId = (int) trim(fgets(STDIN));

                        $this->courses->create([
                            "name" => $name,
                            "department_id" => $departmentId,
                            "formateur_id" => $formateurId
                        ]);
                        echo "Course created.\n";
                        break;

                    case '2':
                        print_r($this->courses->read("id, name", "courses"));
                        break;
                    case '3':
                        print_r($this->courses->read("id, name", "courses"));
                        echo "Enter ID: ";
                        $id = (int) trim(fgets(STDIN));
                        echo "New name: ";
                        $name = trim(fgets(STDIN));

                        $this->courses->update($id, ["name" => $name]);
                        echo "Course updated.\n";
                        break;

                    case '4':
                        print_r($this->courses->read("id, name", "courses"));
                        echo "Enter ID: ";
                        $id = (int) trim(fgets(STDIN));
                        $this->courses->delete($id);
                        echo "Course deleted.\n";
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }

        private function formateurMenu(): void {
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

                        $this->formateurs->create([
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "email"      => $email
                        ]);
                        echo "Formateur created.\n";
                        break;

                    case '2':
                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        break;

                    case '3':
                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        echo "Enter ID: ";
                        $id = (int) trim(fgets(STDIN));

                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));

                        $this->formateurs->update($id, [
                            "first_name" => $firstName,
                            "last_name"  => $lastName,
                            "email"      => $email
                        ]);
                        echo "Formateur updated.\n";
                        break;

                    case '4':
                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        echo "Enter ID: ";
                        $id = (int) trim(fgets(STDIN));
                        $this->formateurs->delete($id);
                        echo "Formateur deleted.\n";
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }
    }