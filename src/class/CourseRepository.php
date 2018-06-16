<?php

require_once realpath(__DIR__.'/../../config/database.php');
require_once 'Course.php';


class CourseRepository
{
    /**
     * @var ../../src/class/database/Database $database
     */
    private $database;

    public function __construct()
    {
        $this->database =  DB::getInstance();
    }

    public function findOneById($id){
        $querry = "SELECT * FROM `courses` WHERE id = '".$id."'";
        $courseData = $this->database->get_row($querry,true);
        if($courseData){
            $course = new Course();

            $course->setId($courseData->id);
            $course->setName($courseData->name);
            $course->setContent($courseData->content);
            $course->setSlug($courseData->slug);
            $course->setDateAdded($courseData->date_added);
            $course->setDateModified($courseData->date_modified);

            return $course;
        }
        return $courseData;
    }

    public function findAll(){
        $querry = "SELECT * FROM `courses`";
        $coursesData = $this->database->get_results($querry,true);

        $courses = [];
        foreach ($coursesData as $key => $courseData){
            $course = new Course();
            $course->setId($courseData->id);
            $course->setName($courseData->name);
            $course->setContent($courseData->content);
            $course->setSlug($courseData->slug);
            $course->setDateAdded($courseData->date_added);
            $course->setDateModified($courseData->date_modified);

            $courses[$courseData->id] = $course;
        }

        return $courses;
    }
}