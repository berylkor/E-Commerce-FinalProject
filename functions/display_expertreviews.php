<?php
include_once("../classes/review_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

function display_expertreviews()
{
    $displayshoppers = new review_class();
    $shoppers = $displayshoppers->get_expertreviews();
    echo 
       " <table>
                <thead>
                    <tr>
                        <th>Reviewed Product</th>
                        <th>Review Score</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";
    foreach ($shoppers as $shopper)
    {
        
        echo "<tr>
                        <td>".$shopper['name']."</td>
                        <td>".$shopper['score']."</td>
                        <td>
                            <a href='../actions/delete_review_action.php?key=".$shopper['review_id']."'><button class='delbtn'><span class='material-symbols-outlined'>delete</span></button></a>
                        </td>
            </tr>";

    }
    echo    "</tbody>
            </table>";
}


?>