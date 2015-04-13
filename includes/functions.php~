<?php

function redirect_to ($destination){
    header("Location: ".$destination);
};

function confirm_query ($query_name){
    if (!$query_name) {
        die("query connect failed");
    }
}



function write_subject_name ($selected_subject) {
        global $selected_subject_id;
        global $connection;
        if (isset($selected_subject_id)){
        $query = "SELECT * FROM subjects WHERE id = {$selected_subject} LIMIT 1";
        $subject = mysqli_query($connection,$query);
        $subjects = mysqli_fetch_array($subject);
        echo "<h3 style=\"color:red\">Manage Subject</h3>";
        echo $subjects['menu_name'];
        };
};

function return_subject_array () {
    global $connection;
    $query = "SELECT * FROM subjects";
    $select_query = mysqli_query($connection,$query);
    while ($subjects = mysqli_fetch_assoc($select_query)) {
        return $subjects;
    }
};



function write_page_name ($selected_page) {
    global $connection;
    global $selected_page_id;
    if (isset($selected_page_id)){
    $query = "SELECT * FROM pages WHERE id = {$selected_page} LIMIT 1";
    $page = mysqli_query($connection,$query);
    $pages = mysqli_fetch_assoc($page);
    echo "<h3 style=\"color:green\">Manage Page</h3>";
    echo $pages['menu_name'];
    };
};

function current_subject ($subject_prop) {
        global $selected_subject_id;
        global $connection;
        if (isset($selected_subject_id)){
        $query = "SELECT * FROM subjects WHERE id = {$selected_subject_id} LIMIT 1";
        $subject = mysqli_query($connection,$query);
        $subjects = mysqli_fetch_array($subject);
        return $subjects[$subject_prop];
        };
};

function current_page ($page_prop) {
        global $selected_page_id;
        global $connection;
        if (isset($selected_page_id)){
        $query = "SELECT * FROM pages WHERE id = {$selected_page_id} LIMIT 1";
        $page = mysqli_query($connection,$query);
        $pages = mysqli_fetch_assoc($page);
        return $pages[$page_prop];
        };
    
};








function current_admin ($prop) {
    global $admin_id;
    global $connection;
    $query = "SELECT * FROM admins WHERE id = '{$admin_id}'";
    $select_query = mysqli_query($connection,$query);
    $admins_array = mysqli_fetch_assoc($select_query);
    return $admins_array[$prop];
}

?>