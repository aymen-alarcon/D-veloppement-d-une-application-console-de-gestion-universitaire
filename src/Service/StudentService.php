<?php
    class StudentService extends UserService{
        private StudentRepository $students;
        private CourseRepository $courses;

        public function __construct(PDO $conn) {
            $this->students = new StudentRepository($conn);
            $this->courses = new CourseRepository($conn);
        }

        function studentMenu() {
            while (true) {
                echo "\n=== students Menu ===\n";
                echo "1. Create Student\n";
                echo "2. List Students by Department\n";
                echo "3. Update Student\n";
                echo "4. Delete Student\n";
                echo "5. Assign Student to Course\n";
                echo "6. List Courses for a Student\n";
                echo "0. Back\n";
                echo "Choose an option: ";

                $choice = trim(fgets(STDIN));

                switch ($choice) {
                    case '1':
                        $this->students->setTable("students");
                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $this->students->create(["first_name" => $firstName,"last_name"  => $lastName,"email" => $email]);
                        echo "student created.\n";
                        break;

                    case '2':
                        $this->students->setTable("students");
                        print_r($this->students->read("id, first_name, last_name"));
                        break;

                    case '3':
                        $this->students->setTable("students");
                        print_r($this->students->read("id, first_name, last_name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));

                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $this->students->update(["id" => $id, "first_name" => $firstName,"last_name"  => $lastName,"email" => $email]);
                        echo "student updated.\n";
                        break;

                    case '4':
                        $this->students->setTable("students");
                        print_r($this->students->read("id, first_name, last_name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        $this->students->delete("id = " . $id);
                        echo "student deleted.\n";
                        break;

                    case '5':
                        $this->students->setTable("students");
                        print_r($this->students->read("id, first_name, last_name"));
                        echo "Enter student's ID: ";
                        $id = trim(fgets(STDIN));
                        $this->courses->setTable("courses");
                        print_r($this->courses->read("id, name"));
                        echo "Enter course's ID: ";
                        $this->students->setTable("students");
                        $courseId = trim(fgets(STDIN));
                        $this->students->updateCourse(["course_id" => $courseId, "id" => $id]);
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