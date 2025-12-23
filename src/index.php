<?php
require "Interface/CrudInterface.php";
require "Repository/FormateurRepository.php";
require "Repository/UserRepository.php";
require "Repository/StudentRepository.php";
require "Repository/CourseRepository.php";
require "Repository/DepartmentRepository.php";
require "Entity/User.php";
require "Entity/Student.php";
require "Database/DatabaseConnection.php";

$connection = new DatabaseConnection();
$conn = $connection->establishConnection();

echo "=== Welcome to University Management CLI ===\n";
echo "Enter your email: ";
$email = trim(fgets(STDIN));

echo "Enter your password: ";
$password = trim(fgets(STDIN));

$courses     = new CourseRepository($conn);
$departments = new DepartmentRepository($conn);
$formateurs  = new FormateurRepository($conn);
$students    = new StudentRepository($conn);
$service     = new UserRepository($conn);

$user = $service->login($email, $password);

if (!$user) {
    echo "Invalid credentials.\n";
    exit;
}

if ($user->getRole() === 'admin') {

    while (true) {
        echo "\n=== University Management ===\n";
        echo "1. Departments\n";
        echo "2. Courses\n";
        echo "3. Formateurs\n";
        echo "4. Students\n";
        echo "0. Exit\n";
        echo "Choose an option: ";

        $option = trim(fgets(STDIN));

        switch ($option) {

            case '1':
                while (true) {
                    echo "\n=== Departments Menu ===\n";
                    echo "1. Create Department\n";
                    echo "2. List Departments\n";
                    echo "3. Update Department\n";
                    echo "4. Delete Department\n";
                    echo "0. Go Back\n";
                    echo "Choose an option: ";

                    $subOption = trim(fgets(STDIN));

                    switch ($subOption) {
                        case '1':
                            echo "Enter Department Name: ";
                            $name = trim(fgets(STDIN));
                            $departments->create([$name]);
                            break;

                        case '2':
                            print_r($departments->read("id, name"));
                            break;

                        case '3':
                            print_r($departments->read("id, name"));
                            echo "Enter ID: ";
                            $id = trim(fgets(STDIN));
                            echo "Enter Name: ";
                            $name = trim(fgets(STDIN));
                            $departments->update([$id, $name]);
                            break;

                        case '4':
                            print_r($departments->read("id, name"));
                            echo "Enter ID: ";
                            $id = trim(fgets(STDIN));
                            $departments->delete("id = $id");
                            break;

                        case '0':
                            break 2;

                        default:
                            echo "Invalid option\n";
                    }
                }
            break;

            case '2':
                while (true) {
                    echo "\n=== Courses Menu ===\n";
                    echo "1. Create Course\n";
                    echo "2. List Courses\n";
                    echo "3. Update Course\n";
                    echo "4. Delete Course\n";
                    echo "0. Go Back\n";
                    echo "Choose an option: ";

                    $subOption = trim(fgets(STDIN));

                    switch ($subOption) {
                        case '1':
                            echo "Enter Course Name: ";
                            $name = trim(fgets(STDIN));

                            print_r($departments->read("id, name"));
                            echo "Enter Department ID: ";
                            $departmentId = trim(fgets(STDIN));

                            print_r($formateurs->read("id, first_name, last_name"));
                            echo "Enter Formateur ID: ";
                            $formateurId = trim(fgets(STDIN));

                            $courses->create([$name, $departmentId, $formateurId]);
                            break;

                        case '2':
                            print_r($courses->read("id, name"));
                            break;

                        case '3':
                            print_r($courses->read("id, name"));
                            echo "Enter ID: ";
                            $id = trim(fgets(STDIN));
                            echo "Enter Name: ";
                            $name = trim(fgets(STDIN));
                            $courses->update([$id, $name]);
                            break;

                        case '4':
                            print_r($courses->read("id, name"));
                            echo "Enter ID: ";
                            $id = trim(fgets(STDIN));
                            $courses->delete("id = $id");
                            break;

                        case '0':
                            break 2;

                        default:
                            echo "Invalid option\n";
                    }
                }
            break;

            case '3':
                while (true) {
                    echo "\n=== Formateurs Menu ===\n";
                    echo "1. Create Formateur\n";
                    echo "2. List Formateurs\n";
                    echo "3. Update Formateur\n";
                    echo "4. Delete Formateur\n";
                    echo "0. Go Back\n";
                    echo "Choose an option: ";

                    $subOption = trim(fgets(STDIN));

                    switch ($subOption) {
                        case '1':
                            echo "First Name: ";
                            $firstName = trim(fgets(STDIN));
                            echo "Last Name: ";
                            $lastName = trim(fgets(STDIN));
                            echo "Email: ";
                            $email = trim(fgets(STDIN));
                            $formateurs->create([$firstName, $lastName, $email]);
                            break;

                        case '2':
                            print_r($formateurs->read("id, first_name, last_name"));
                            break;

                        case '3':
                            print_r($formateurs->read("id, first_name, last_name"));
                            echo "Enter ID: ";
                            $id = trim(fgets(STDIN));
                            echo "First Name: ";
                            $firstName = trim(fgets(STDIN));
                            echo "Last Name: ";
                            $lastName = trim(fgets(STDIN));
                            echo "Email: ";
                            $email = trim(fgets(STDIN));
                            $formateurs->update([$id, $firstName, $lastName, $email]);
                            break;

                        case '4':
                            print_r($formateurs->read("id, first_name, last_name"));
                            echo "Enter ID: ";
                            $id = trim(fgets(STDIN));
                            $formateurs->delete("id = $id");
                            break;

                        case '0':
                            break 2;

                        default:
                            echo "Invalid option\n";
                    }
                }
            break;

            case '4':
                while (true) {
                    echo "\n=== Students Menu ===\n";
                    echo "1. Create Student\n";
                    echo "2. List Students\n";
                    echo "3. Update Student\n";
                    echo "4. Delete Student\n";
                    echo "0. Go Back\n";
                    echo "Choose an option: ";

                    $subOption = trim(fgets(STDIN));

                    switch ($subOption) {
                        case '1':
                            echo "First Name: ";
                            $firstName = trim(fgets(STDIN));
                            echo "Last Name: ";
                            $lastName = trim(fgets(STDIN));
                            echo "Email: ";
                            $email = trim(fgets(STDIN));
                            $students->create([$firstName, $lastName, $email]);
                            break;

                        case '2':
                            print_r($students->read("id, first_name, last_name"));
                            break;

                        case '3':
                            print_r($students->read("id, first_name, last_name"));
                            echo "Enter ID: ";
                            $id = trim(fgets(STDIN));
                            echo "First Name: ";
                            $firstName = trim(fgets(STDIN));
                            echo "Last Name: ";
                            $lastName = trim(fgets(STDIN));
                            echo "Email: ";
                            $email = trim(fgets(STDIN));
                            $students->update([$id, $firstName, $lastName, $email]);
                            break;

                        case '4':
                            print_r($students->read("id, first_name, last_name"));
                            echo "Enter ID: ";
                            $id = trim(fgets(STDIN));
                            $students->delete("id = $id");
                            break;

                        case '0':
                            break 2;

                        default:
                            echo "Invalid option\n";
                    }
                }
            break;

            case '0':
                echo "Goodbye!\n";
                exit;

            default:
                echo "Invalid option\n";
        }
    }
}