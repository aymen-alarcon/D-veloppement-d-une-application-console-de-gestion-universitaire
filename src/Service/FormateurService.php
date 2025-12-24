<?php 
class FormateurService{
    private FormateurRepository $formateurs;
    private CourseRepository $courses;

    public function __construct(PDO $conn)
    {
        $this->formateurs = new FormateurRepository($conn);
    }

    function formateurMenu() {
            while (true) {
                echo "\n=== Formateurs Menu ===\n";
                echo "1. Create Formateur\n";
                echo "2. List Formateurs\n";
                echo "3. Update Formateur\n";
                echo "4. Delete Formateur\n";
                echo "5. Assign Formateur to Course\n";
                echo "0. Back\n";
                echo "Choose an option: ";

                $choice = trim(fgets(STDIN));

                switch ($choice) {
                    case '1':
                        $this->formateurs->useTable("formateurs");
                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $this->formateurs->create(["first_name" => $firstName,"last_name"  => $lastName,"email" => $email]);
                        echo "Formateur created.\n";
                        break;

                    case '2':
                        $this->formateurs->useTable("formateurs");
                        print_r($this->formateurs->read("id, first_name, last_name"));
                        break;

                    case '3':
                        $this->formateurs->useTable("formateurs");
                        print_r($this->formateurs->read("id, first_name, last_name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $this->formateurs->update(["id" => $id, "first_name" => $firstName,"last_name"  => $lastName,"email" => $email]);
                        echo "Formateur updated.\n";
                        break;

                    case '4':
                        $this->formateurs->useTable("formateurs");
                        print_r($this->formateurs->read("id, first_name, last_name"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        $this->formateurs->delete("id = " . $id);
                        echo "Formateur deleted.\n";
                        break;

                    case '5':
                        $this->formateurs->useTable("formateurs");
                        print_r($this->formateurs->read("id, first_name, last_name"));
                        echo "Enter formateur's ID: ";
                        $id = trim(fgets(STDIN));
                        $this->courses->useTable("courses");
                        print_r($this->courses->read("id, name"));
                        echo "Enter course's ID: ";
                        $courseId = trim(fgets(STDIN));
                        $this->formateurs->updateCourse(["course_id" => $courseId, "id" => $id]);
                        echo "formateur deleted.\n";
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }
}