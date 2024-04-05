<?php
///get the database connection
include 'conn.php';
///check if the delete query parameter is set
if (isset($_GET['delete'])) {
    ///get the vet name from the delete query
    /// urldecode() Decodes any encoded value in the given string which was encoded via urlencode() function
    $name = urldecode($_GET['delete']);
    ///sql statement to delete the assigned vet from clents table based on the search delete query name
    $sql = "DELETE FROM clents where farmer_name='$name'";
    ///query and execute the result
    $results = $db->query($sql);
    if ($results) {
        ///on successful query and deletion alert user
        echo "Deleted successfully";
        ///redirect back to the former page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>
