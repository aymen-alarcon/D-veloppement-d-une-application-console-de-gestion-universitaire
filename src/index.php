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

    $service = new UserRepository($conn);
    $user = $service->login($email, $password);

    if (!$user) {
        echo "Invalid credentials.\n";
        exit;
    }else{
        echo "good work";
    }

    if ($user->getRole() == 'admin') {
        echo "=== University Management ===\n\n";
        echo "Select an entity to manage:\n";
        echo "1. Departments\n";
        echo "2. Courses\n";
        echo "3. Formateurs\n";
        echo "4. Students\n";
        echo "Choose an option: ";
        $option = fgets(STDIN);
        switch ($option) {
            case '1':
                echo "\n=== Departments Menu ===\n";
                echo "1. Create Department\n";
                echo "2. List Departments\n";
                echo "3. Update Department\n";
                echo "4. Delete Department\n";
                echo "0. Go Back\n\n";
                echo "Choose an option: ";
                $subOption = fgets(STDIN);    
                switch ($subOption) {
                    case '1':
                            echo "\n=== Create Departments Menu ===\n";
                            echo "Enter Departments  Name: \n";
                            $name = trim(fgets(STDIN));
                            $departments = new DepartmentRepository($conn);
                            $data = []; 
                            array_push($data, $name);
                            $user = $departments->create($data);
                            echo "0. Go Back\n\n";
                    case '2':
                        break;
                    case '3':
                        break;
                    case '4':
                        break;
                    case '5':
                        break;
                    
                    default:
                        # code...
                        break;
                }
            break;
            case '2':
                echo "\n=== Courses Menu ===\n";
                echo "1. Create Course\n";
                echo "2. List Courses by Department\n";
                echo "3. Update Course\n";
                echo "4. Delete Course\n";
                echo "0. Go Back\n\n";
                echo "Choose an option: ";
                $subOption = fgets(STDIN);  
                switch ($subOption) {
                    case '1':
                            $course = new CourseRepository($conn);
                            $formateur = new FormateurRepository($conn);
                            echo "\n=== Create Course Menu ===\n";
                            echo "Enter Course  Name: \n";
                            $name = trim(fgets(STDIN));
                            echo "Enter the course's department id: \n";
                            print_r($course->read("id, name")); 
                            $department = trim(fgets(STDIN));
                            echo "Enter the formateur's id that will teach this course Name: \n";
                            print_r($formateur->read("id, first_name, last_name")); 
                            $formateur = trim(fgets(STDIN));
                            $data = []; 
                            array_push($data, $name, $department, $formateur);
                            $user = $course->create($data);
                            echo "0. Go Back\n\n";
                        break;
                    case '2':
                        break;
                    case '3':
                        break;
                    case '4':
                        break;
                    case '5':
                        break;
                    
                    default:
                        # code...
                        break;
                }
            break;
            case '3':
                echo "\n=== Formateurs Menu ===\n";
                echo "1. Create Formateur\n";
                echo "2. List Formateurs\n";
                echo "3. Update Formateur\n";
                echo "4. Delete Formateur\n";
                echo "5. Assign Formateur to Course\n";
                echo "0. Go Back\n\n";
                echo "Choose an option: ";
                $subOption = fgets(STDIN);   
                switch ($subOption) {
                    case '1':
                        echo "\n=== Create Formateur Menu ===\n";
                        echo "Enter Formateur First Name: \n";
                        $firstName = trim(fgets(STDIN));
                        echo "Enter Formateur Last Name: \n";
                        $lastName = trim(fgets(STDIN));
                        echo "Enter Formateur email: \n";
                        $email = trim(fgets(STDIN));
                        $formateur = new FormateurRepository($conn);
                        $data = []; 
                        array_push($data, $firstName, $lastName, $email);
                        $user = $formateur->create($data);
                        echo "0. Go Back\n\n";
                        break;
                    case '2':
                        break;
                    case '3':
                        break;
                    case '4':
                        break;
                    case '5':
                        break;
                    
                    default:
                        # code...
                        break;
                }
            break;
            case '4':
                echo "\n=== Students Menu ===\n";
                echo "1. Create Student\n";
                echo "2. List Students by Department\n";
                echo "3. Update Student\n";
                echo "4. Delete Student\n";
                echo "5. Assign Student to Department\n";
                echo "6. List Courses for a Student\n";
                echo "0. Go Back\n\n";
                echo "Choose an option: ";
                $subOption = fgets(STDIN);
                switch ($subOption) {
                    case '1':
                        echo "\n=== Create Student Menu ===\n";
                        echo "Enter Students First Name: \n";
                        $firstName = trim(fgets(STDIN));
                        echo "Enter Students Last Name: \n";
                        $lastName = trim(fgets(STDIN));
                        echo "Enter Students email: \n";
                        $email = trim(fgets(STDIN));
                        $students = new StudentRepository($conn);
                        $data = []; 
                        array_push($data, $firstName, $lastName, $email);
                        $user = $students->create($data);
                        echo "0. Go Back\n\n";
                        break;
                    case '2':
                        break;
                    case '3':
                        // $students = new StudentRepository($conn);
                        // $user = $students->createStudent($firstName, $lastName, $email);
                        echo "\n=== Update Student Menu ===\n";
                        echo "Enter Students email: \n";
                        $id = trim(fgets(STDIN));
                        echo "Enter Students First Name: \n";
                        $firstName = trim(fgets(STDIN));
                        echo "Enter Students Last Name: \n";
                        $lastName = trim(fgets(STDIN));
                        echo "Enter Students email: \n";
                        $email = trim(fgets(STDIN));
                        $students = new StudentRepository($conn);
                        $data = []; 
                        array_push($data, $id, $firstName, $lastName, $email);
                        $user = $students->update($data);
                        echo "0. Go Back\n\n";
                        break;
                    case '4':
                        break;
                    case '5':
                        break;
                    
                    default:
                        # code...
                        break;
                }
            break; 
            default:
                break;
        }

    }