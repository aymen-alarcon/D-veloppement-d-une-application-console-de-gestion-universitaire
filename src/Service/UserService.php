<?php
    class UserService {
        private PDO $conn;
        private StudentService $students;
        private DepartmentService $departments;
        private CourseService $courses;
        private FormateurService $formateurs;
        

        public function __construct(PDO $conn) {
            $this->conn = $conn;
            $this->departments = new DepartmentService($this->conn);
            $this->courses     = new CourseService($this->conn);
            $this->formateurs  = new FormateurService($this->conn);
            $this->students  = new StudentService($this->conn);
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
        }
    }