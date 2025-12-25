<?php 
class FormateurService{
    private FormateurRepository $formateurs;
    private CourseRepository $courses;

    public function __construct(PDO $conn)
    {
        $this->formateurs = new FormateurRepository($conn);
        $this->courses = new CourseRepository($conn);
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
                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $formateur = new Formateur(NULL, "formateurs", $firstName, $lastName, $email); 
                        $this->formateurs->create($formateur);
                        echo "Formateur created.\n";
                        break;

                    case '2':
                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        break;

                    case '3':
                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        echo "First name: ";
                        $firstName = trim(fgets(STDIN));
                        echo "Last name: ";
                        $lastName = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        $formateur = new Formateur($id, "formateurs", $firstName, $lastName, $email); 
                        $this->formateurs->update($formateur);
                        echo "Formateur updated.\n";
                        break;

                    case '4':
                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        echo "Enter ID: ";
                        $id = trim(fgets(STDIN));
                        $this->formateurs->delete("id = " . $id, "formateurs");
                        echo "Formateur deleted.\n";
                        break;

                    case '5':
                        print_r($this->formateurs->read("id, first_name, last_name", "formateurs"));
                        echo "Enter formateur's ID: ";
                        $id = trim(fgets(STDIN));
                        print_r($this->courses->read("id, name", "courses"));
                        echo "Enter course's ID: ";
                        $courseId = trim(fgets(STDIN));
                        $this->courses->assignToCourse("formateurs_course", "formateur_id", $id, $courseId);
                        break;

                    case '0':
                        return;

                    default:
                        echo "Invalid option.\n";
                }
            }
        }
}