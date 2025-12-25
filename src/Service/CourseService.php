<?php
class CourseService{
    private CourseRepository $courses;
    private DepartmentRepository $departments;
    private FormateurRepository $formateurs;

    function __construct(PDO $conn)
    {
        $this->formateurs = new FormateurRepository($conn);
        $this->departments = new DepartmentRepository($conn);
        $this->courses = new CourseRepository($conn);
    }

    function courseMenu() {
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
                        print_r($this->departments->read("*", "departments"));
                        echo "Department ID: ";
                        $departmentId = trim(fgets(STDIN));
                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        echo "Formateur ID: ";
                        $formateurId = trim(fgets(STDIN));
                        $course = new Course(NULL, $name, "courses", $departmentId, $formateurId);
                        $this->courses->create($course);
                        echo "Course created.\n";
                        break;

                    case '2':
                        print_r($this->courses->read("id, name", "courses"));
                        break;
                    case '3':
                        print_r($this->courses->read("id, name", "courses"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        echo "New name: ";
                        $name = trim(fgets(STDIN));
                        print_r($this->departments->read("*", "departments"));
                        echo "Department ID: ";
                        $departmentId = trim(fgets(STDIN));
                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        echo "Formateur ID: ";
                        $formateurId = trim(fgets(STDIN));
                        $course = new Course($id, $name, "courses", $departmentId, $formateurId);
                        $this->courses->update($course);
                        echo "Course updated.\n";
                        break;

                    case '4':
                        print_r($this->courses->read("id, name", "courses"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        $this->courses->delete("id = " . $id, "courses");
                        echo "Course deleted.\n";
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }
}