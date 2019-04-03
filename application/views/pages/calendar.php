<div class="calendar">
    <table>
        <tr><th colspan="7"><?php echo date('F'); ?></th></tr>
        <tr>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
            <th>Sun</th>
        </tr>

        <?php
            if($cal_start == 1):
                $day = 0;
                for($i=1; $i<=6; $i++):
        ?>
        <tr> <!-- Start of row -->

        <?php
                    for($x=1; $x<=7; $x++):
                        $day++;
                        if($day>$month_end) { $day = 1; }
                        echo "<td class=\"\"><a href=\"#\">$day</a></td>";
                    endfor;
        ?>

        </tr> <!-- End of row -->
        <?php
                endfor;
            endif;
        ?>
    </table>
</div>
