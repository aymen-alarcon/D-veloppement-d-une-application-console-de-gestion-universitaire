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
                        $this->departments->useTable("departments");
                        print_r($this->departments->read("id, name"));
                        echo "Department ID: ";
                        $departmentId = trim(fgets(STDIN));
                        $this->formateurs->useTable("formateurs");
                        print_r($this->formateurs->read("id, first_name, last_name"));
                        echo "Formateur ID: ";
                        $formateurId = trim(fgets(STDIN));
                        $this->courses->useTable("courses");
                        $this->courses->create(["name" => $name,"department_id" => $departmentId,"formateur_id" => $formateurId]);
                        echo "Course created.\n";
                        break;

                    case '2':
                        $this->courses->useTable("courses");
                        print_r($this->courses->read("id, name"));
                        break;
                    case '3':
                        $this->courses->useTable("courses");
                        print_r($this->courses->read("id, name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        echo "New name: ";
                        $name = trim(fgets(STDIN));
                        $this->courses->update(["name" => $name, "id" => $id]);
                        echo "Course updated.\n";
                        break;

                    case '4':
                        $this->courses->useTable("courses");
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
}