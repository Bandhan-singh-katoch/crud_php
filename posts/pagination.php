<?php
$sql1 = "SELECT * FROM user WHERE CONCAT_WS('',name,description) LIKE '%$keyword%' ORDER BY {$sort_by} {$sort_order}";
$result1 = $conn->query($sql1);
$total_rows = $result1->num_rows;
if ($total_rows > 0) {
    $total_page = ceil($total_rows / $limit);

    echo '<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">';

    if ($page > 1) {
        echo '<li class="page-item">
                 <a class="page-link" href="list.php?page=1" aria-label="Previous">
                 <span aria-hidden="true">&laquo;</span>
                 </a>
              </li>
        <li class="page-item">
            <a class="page-link" href="list.php?page=' . ($page - 1) . '">Prev</a>
        </li>';
    }
    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "";
        }
        echo '<li class="page-item ' . $active . '"><a class="page-link" href="list.php?page=' . $i . '&order=' . $sort_order . '">' . $i . '</a></li>';
    }

    if ($total_page > $page) {
        echo '<li class="page-item">
            <a class="page-link" href="list.php?page=' . ($page + 1) . '">Next</a>
        </li>
        <li class="page-item">
         <a class="page-link" href="list.php?page=' . $total_page . '" aria-label="Next">
         <span aria-hidden="true">&raquo;</span>
         <span class="sr-only">Next</span>
         </a>
        </li>';
    }

    echo '</ul>
        </nav>';
}
