<?php
require_once APP_ROOT . '/app/services/ClassRoomService.php';
require_once APP_ROOT . '/app/services/StudentService.php';
class HomeController
{
    // ClassRoom
    public function ClassRoom($key)
    {
        $ClassRoomService = new ClassRoomService();
        $ClassRooms = $ClassRoomService->getByClassRoomCount($key);
        $ClassRoomService = new ClassRoomService();
        $count = $ClassRoomService->getCount();
        $key;
        include APP_ROOT . '/app/views/home/ClassRoom.php';
    }
    public function add_ClassRoom()
    {
        $check_add = "";
        include APP_ROOT . '/app/views/home/add_ClassRoom.php';
    }
    public function ClassRoom_add($ten_tloai)
    {
        $ClassRoomService = new ClassRoomService();
        $check_add = $ClassRoomService->addClassRoom($ten_tloai);
        if ($check_add == 'true') {
            $ClassRoomService = new ClassRoomService();
            $ClassRooms = $ClassRoomService->getByClassRoomCount(1);
            $ClassRoomService = new ClassRoomService();
            $count = $ClassRoomService->getCount();
            $key = 1;
            include APP_ROOT . '/app/views/home/ClassRoom.php';
        } else {
            include APP_ROOT . '/app/views/home/add_ClassRoom.php';
        }
    }
    public function edit_ClassRoom($id)
    {
        $ClassRoom_id = $id;
        $check_edit = "";
        include APP_ROOT . '/app/views/home/edit_ClassRoom.php';
    }
    public function ClassRoom_edit($id, $ten_tloai)
    {
        $ClassRoomService = new ClassRoomService();
        $check_edit = $ClassRoomService->editClassRoom($id, $ten_tloai);
        $ClassRoom_id = $id;
        if ($check_edit == 'true') {
            $ClassRoomService = new ClassRoomService();
            $ClassRooms = $ClassRoomService->getByClassRoomCount(1);
            $ClassRoomService = new ClassRoomService();
            $count = $ClassRoomService->getCount();
            $key = 1;
            include APP_ROOT . '/app/views/home/ClassRoom.php';
        } else {
            include APP_ROOT . '/app/views/home/edit_ClassRoom.php';
        }
    }
    public function delete_ClassRoom($id)
    {
        $ClassRoomService = new ClassRoomService();
        $check_delete = $ClassRoomService->deleteClassRoom($id);
        $ClassRoom_id = $id;
        if ($check_delete == 'true') {
            $ClassRoomService = new ClassRoomService();
            $ClassRooms = $ClassRoomService->getByClassRoomCount(1);
            $ClassRoomService = new ClassRoomService();
            $count = $ClassRoomService->getCount();
            $key = 1;
            include APP_ROOT . '/app/views/home/ClassRoom.php';
        } else {
            $ClassRoomService = new ClassRoomService();
            $ClassRooms = $ClassRoomService->getByClassRoomCount(1);
            $ClassRoomService = new ClassRoomService();
            $count = $ClassRoomService->getCount();
            $key = 1;
            include APP_ROOT . '/app/views/home/ClassRoom.php';
        }
    }
    //Student
    public function Student($key)
    {
        $StudentService = new StudentService();
        $Students = $StudentService->getByStudentCount($key);
        $StudentService = new StudentService();
        $count = $StudentService->getCount();
        $key;
        include APP_ROOT . '/app/views/home/Student.php';
    }
    public function add_Student()
    {
        $ClassRoomService = new ClassRoomService();
        $ClassRooms = $ClassRoomService->getAllClassRoomService();
        $check_add = "";
        include APP_ROOT . '/app/views/home/add_Student.php';
    }
    public function Student_add($tenSinhVien, $email, $ngaySinh, $idLop)
    {
        $StudentService = new StudentService();
        $check_add = $StudentService->addStudent($tenSinhVien, $email, $ngaySinh, $idLop);
        if ($check_add == 'true') {
            $StudentService = new StudentService();
            $Students = $StudentService->getByStudentCount(1);
            $StudentService = new StudentService();
            $count = $StudentService->getCount();
            $key = 1;
            include APP_ROOT . '/app/views/home/Student.php';
        } else {
            include APP_ROOT . '/app/views/home/add_Student.php';
        }
    }
    public function edit_Student($id)
    {
        $ClassRoomService = new ClassRoomService();
        $ClassRooms = $ClassRoomService->getAllClassRoomService();
        $Student_id = $id;
        $check_edit = "";
        include APP_ROOT . '/app/views/home/edit_Student.php';
    }
    public function Student_edit($id, $tenSinhVien, $email, $ngaySinh, $idLop)
    {
        $StudentService = new StudentService();
        $check_edit = $StudentService->editStudent($id, $tenSinhVien, $email, $ngaySinh, $idLop);
        $Student_id = $id;
        if ($check_edit == 'true') {
            $StudentService = new StudentService();
            $Students = $StudentService->getByStudentCount(1);
            $StudentService = new StudentService();
            $count = $StudentService->getCount();
            $key = 1;
            include APP_ROOT . '/app/views/home/Student.php';
        } else {
            include APP_ROOT . '/app/views/home/edit_Student.php';
        }
    }
    public function delete_Student($id)
    {
        $StudentService = new StudentService();
        $check_delete = $StudentService->deleteStudent($id);
        $Student_id = $id;
        if ($check_delete == 'true') {
            $StudentService = new StudentService();
            $Students = $StudentService->getByStudentCount(1);
            $StudentService = new StudentService();
            $count = $StudentService->getCount();
            $key = 1;
            include APP_ROOT . '/app/views/home/Student.php';
        } else {
            $StudentService = new StudentService();
            $Students = $StudentService->getByStudentCount(1);
            $StudentService = new StudentService();
            $count = $StudentService->getCount();
            $key = 1;
            include APP_ROOT . '/app/views/home/Student.php';
        }
    }
}