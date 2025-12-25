<?php
    class Course{
        protected $id;
        protected $name;
        protected $table;
        protected $formateurId;
        protected $courseId;

        function __construct($id, $name, $table, $formateurId, $courseId){
            $this->id = $id;
            $this->name = $name;
            $this->table = $table;
            $this->courseId = $courseId;
            $this->formateurId = $formateurId;
        }

        function getId(){
            return $this->id;
        }

        function getTable(){
            return $this->table;
        }
        
        public function getName()
        {
            return $this->name;
        }

        function setTable(string $table){
            $this->table = $table;
        }    

        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

            public function getFormateur()
            {
                        return $this->formateurId;
            }

            public function setFormateur($formateurId)
            {
                        $this->formateurId = $formateurId;

                        return $this;
            }

            public function getCourseId()
            {
                        return $this->courseId;
            }

            public function setCourseId($courseId)
            {
                        $this->courseId = $courseId;

                        return $this;
            }
    }
?>