<?php
    class UserService {
        private PDO $conn;
        private StudentService $students;
        private DepartmentService $departments;
        private CourseService $courses;
        private FormateurService $formateurs;
        private UserRepository $service;

        public function __construct(PDO $conn) {
            $this->conn = $conn;
            $this->departments = new DepartmentService($this->conn);
            $this->courses     = new CourseService($this->conn);
            $this->formateurs  = new FormateurService($this->conn);
            $this->students  = new StudentService($this->conn);
            $this->service = new UserRepository($this->conn);
        }

        public function run() {
            while (true) {
                $this->showMainMenu();
            }
        }
        
        private function showMainMenu() {
            echo "=== Welcome to University Management CLI ===\n";
            echo "Enter your email: ";
            $email = trim(fgets(STDIN));
            echo "Enter your password: ";
            $password = trim(fgets(STDIN));
            $credentials = new User($password, null, $email);
            $loggedUser = $this->service->login($credentials);

            if (!$loggedUser || $loggedUser === "Invalid Credentials") {
                echo "Invalid credentials.\n";
                exit;
            }

            echo "good work.\n";

            if ($credentials->getRole() == 'admin') {
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
                        $this->departments->departmentMenu();
                        break;

                    case '2':
                        $this->courses->courseMenu();
                        break;

                    case '3':
                        $this->formateurs->formateurMenu();
                        break;

                    case '4':
                        $this->students->studentMenu();
                        break;

                    case '0':
                        echo "Goodbye!\n";
                        exit;

                    default:
                        echo "Invalid option.\n";
                }
            }else{
                echo "1. View Courses by Department\n";
                echo "2. View Courses by Formateur\n";
                echo "3. View Students by Department\n";
                echo "4. View Courses Followed by a Student\n";
                echo "0. Exit\n";
                echo "Choose an option: ";

                $choice = trim(fgets(STDIN));

                switch ($choice) {

                    case '1':
                        print_r($this->service->read("*", "departments"));
                        echo "Enter department id: ";
                        $id = trim(fgets(STDIN));
                        print_r($this->service->getCoursesByDepartment($id));
                        break;

                    case '2':
                        print_r($this->service->read("*", "formateurs"));
                        echo "Enter formateur id: ";
                        $id = trim(fgets(STDIN));
                        print_r($this->service->getCoursesByFormateur($id));
                        break;

                    case '3':
                        print_r($this->service->read("*", "departments"));
                        echo "Enter department id: ";
                        $id = trim(fgets(STDIN));
                        print_r($this->service->getStudentsByDepartment($id));
                        break;

                    case '4':
                        print_r($this->service->read("*", "students"));
                        echo "Enter student id: ";
                        $id = trim(fgets(STDIN));
                        print_r($this->service->getCoursesByStudent($id));
                        break;

                    case '0':
                        echo "Goodbye!\n";
                        exit;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }
}