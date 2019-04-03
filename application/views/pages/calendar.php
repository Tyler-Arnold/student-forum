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
                $next_month_flag = false;
                for($i=1; $i<=6; $i++):
        ?>
        <tr> <!-- Start of row -->

        <?php
                    // only runs if month begins with Monday
                    for($x=1; $x<=7; $x++):
                        $day++;
                        if($day > $month_end) { // if month is over
                            $day = 1;
                            $next_month_flag = true;
                        }

                        if($next_month_flag) { $class="out-of-month"; }
                        elseif($day == $today) { $class="today"; }
                        elseif($x>=6) { $class="unavailable"; }
                        else { $class=""; }

                        echo "<td class=\"$class\"><a href=\"#\">$day</a></td>";
                    endfor;
        ?>

        </tr> <!-- End of row -->
        <?php
                endfor;
            endif;
        ?>
    </table>
</div>
