<?php
global $wpdb;
$all_students = $wpdb->get_results(
        $wpdb->prepare(
                "SELECT * from wp_next_plugin", ""
        ), ARRAY_A
);

$action = isset($_GET['action']) ? trim($_GET['action']) : "";
$id = isset($_GET['id']) ? intval($_GET['id']) : "";
if (!empty($action) && $action == "delete") {

$row_exists = $wpdb->get_row(
        $wpdb->prepare(
                "SELECT * from wp_next_plugin WHERE id = %d", $id
        )
);
if (count($row_exists) > 0) {
    $wpdb->delete("wp_next_plugin", array(
        "id" => $id
    ));
}


function renderMenuItem($id, $label, $url)
{
    return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-url="' . $url . '">' .
        '<div class="dd-handle dd3-handle" > Drag</div>' .
        '<div class="dd3-content"><span>' . $label . '</span>' .
        '<div class="item-edit">Edit</div>' .
        '</div>' .
        '<div class="item-settings d-none">' .
        '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
        '<p><label for="">Navigation Url<br><input type="text" name="navigation_url" value="' . $url . '"></label></p>' .
        '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
        '<a class="item-close" href="javascript:;">Close</a></p>' .
        '</div>';

}

function menuTree($parent_id = 0)
{
    global $db;
    $items = '';
    $query = $db->query("SELECT * FROM menu WHERE parent_id = ? ORDER BY id_menu ASC", $parent_id);
    if ($query->numRows() > 0) {
        $items .= '<ol class="dd-list">';
        $result = $query->fetchAll();
        foreach ($result as $row) {
            $items .= renderMenuItem($row['id_menu'], $row['label_menu'], $row['url_menu']);
            $items .= menuTree($row['id_menu']);
            $items .= '</li>';
        }
        $items .= '</ol>';
    }
    return $items;
}

?>
    <header>
        <link rel="stylesheet" href="../css/jquery.nestable.css">
        <link rel="stylesheet" href="../css/style.css">
    </header>
    <script>
        location.href = "<?php echo site_url() ?>/wp-admin/admin.php?page=wp-next-plugin";
    </script>
    <?php
}

if (count($all_students) > 0) {
    ?>
    <table cellpadding="10" border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        $count = 1;
        foreach ($all_students as $index => $student) {
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $student['name'] ?></td>
                <td><?php echo $student['email'] ?></td>
                <td>
                    <a href="admin.php?page=wp-next-add&action=edit&id=<?php echo $student['id']; ?>">Modifier </a>
                    <a href="admin.php?page=wp-next-plugin&id=<?php echo $student['id']; ?>&action=delete" onclick="return confirm('Are you sure want to delete?')"> Supprimer</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    

    <div class="dd" id="nestable">
        <?php
            $html_menu = menuTree();
            echo (empty($html_menu)) ? '<ol class="dd-list"></ol>' : $html_menu;
        ?>
    </div>

    <?php
}
?>