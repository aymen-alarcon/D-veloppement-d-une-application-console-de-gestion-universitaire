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
                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $student = new Student(NULL, "students", $email, $firstName, $lastName);
                        $this->students->create($student);
                        echo "student created.\n";
                        break;

                    case '2':
                        print_r($this->students->read("*", "students"));
                        break;

                    case '3':
                        print_r($this->students->read("*", "students"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        echo "First name: ";  
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";   
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";       
                        $email = trim(fgets(STDIN));
                        $student = new Student($id, "students", $email, $firstName, $lastName);
                        $this->students->update($student);
                        echo "Student updated.\n";
                        break;
                    case '4':
                        print_r($this->students->read("*", "students"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        $this->students->delete("id = " . $id , "students");
                        echo "student deleted.\n";
                        break;

                    case '5':
                        print_r($this->students->read("id, first_name, last_name", "students"));
                        echo "Enter student's ID: ";
                        $id = trim(fgets(STDIN));
                        print_r($this->courses->read("id, name", "courses"));
                        echo "Enter course's ID: ";
                        $courseId = trim(fgets(STDIN));
                        $this->courses->assignToCourse("student_course", "student_id", $id, $courseId);
                        break;

                    case '6':
                        print_r($this->students->read("*", "students"));
                        echo "Enter student ID: ";
                        $id = trim(fgets(STDIN));
                        print_r($this->students->readAll($id));
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }
    }