<?php
global $wpdb;
$msg = '';

$action = isset($_GET['action']) ? trim($_GET['action']) : "";
$id = isset($_GET['id']) ? intval($_GET['id']) : "";

$row_details = $wpdb->get_row(
        $wpdb->prepare(
                "SELECT * from wp_next_plugin WHERE id = %d", $id
        ), ARRAY_A
);

$wp_pages = get_pages();



if (isset($_POST['btnsubmit'])) {

    $action = isset($_GET['action']) ? trim($_GET['action']) : "";
    $id = isset($_GET['id']) ? intval($_GET['id']) : "";

    if (!empty($action)) {

        $wpdb->update("wp_next_plugin", array(
            "name" => $_POST['txtname'],
                ), array(
            "id" => $id
        ));

        $msg = "Form data updated successfully";
    } else {

        $wpdb->insert("wp_next_plugin", array(
            "name" => $_POST['txtname'],
        ));

        if ($wpdb->insert_id > 0) {
            $msg = "Form data saved successfully";
        } else {
            $msg = "Failed to save data";
        }
    }
}
?>

<p><?php echo $msg; ?></p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=wp-next-add<?php
if (!empty($action)) {
    echo '&action=edit&id=' . $id;
}
?>" method="post">
    <?php foreach($wp_pages as $page) : ?>
        <input value="<?= $page->post_title ?>" type="checkbox"> <?= $page->post_title ?> <br>
    <?php endforeach; ?>
    <p>
        <label>
            Name Page
        </label>
        <input type="text" name="txtname" value="<?php echo isset($row_details['name']) ? $row_details['name'] : ""; ?>" placeholder="Enter name page"/>
    </p>
    <p>
        <button type="submit" name="btnsubmit">Submit</button>
    </p>
</form>