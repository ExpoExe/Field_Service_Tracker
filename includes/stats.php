<?php $display_data = get_all_current_data(); ?>

<div id="statFade1">
<div class="stat_box_wrap">
	<h3>Todays Stats</h3>
    <div class="stat_box">
        <table width="200" border="0">
          <tbody>
            <tr>
              <th scope="row">Hours: </th>
              <td><?php echo $display_data['hours_day']; ?></td>
            </tr>
            <tr>
              <th scope="row">Magazines: </th>
              <td><?php echo $display_data['magazines_day']; ?></td>
            </tr>
            <tr>
              <th scope="row">Tracts: </th>
              <td><?php echo $display_data['tracts_day']; ?></td>
            </tr>
            <tr>
              <th scope="row">Brochures: </th>
              <td><?php echo $display_data['brochures_day']; ?></td>
            </tr>
            <tr>
              <th scope="row">Books: </th>
              <td><?php echo $display_data['books_day']; ?></td>
            </tr>
            <tr>
              <th scope="row">Return Visits: </th>
              <td><?php echo $display_data['rv_count_day']; ?></td>
            </tr>
            <tr>
              <th scope="row">Bible Studies: </th>
              <td><?php echo $display_data['study_count_day']; ?></td>
            </tr>
            <tr>
              <th scope="row">Other Hours: </th>
              <td><?php echo $display_data['other_hours_day']; ?></td>
            </tr>
          </tbody>
        </table>  
    </div>
</div>
</div>

<div id="statFade2">
<div class="stat_box_wrap">
	<h3>Your Month At a Glance...</h3>
    <div class="stat_box">
        <table width="200" border="0">
          <tbody>
            <tr>
              <th scope="row">Hours: </th>
              <td><?php echo $display_data['hours_month']; ?></td>
            </tr>
            <tr>
              <th scope="row">Magazines: </th>
              <td><?php echo $display_data['magazines_month']; ?></td>
            </tr>
            <tr>
              <th scope="row">Tracts: </th>
              <td><?php echo $display_data['tracts_month']; ?></td>
            </tr>
            <tr>
              <th scope="row">Brochures: </th>
              <td><?php echo $display_data['brochures_month']; ?></td>
            </tr>
            <tr>
              <th scope="row">Books: </th>
              <td><?php echo $display_data['books_month']; ?></td>
            </tr>
            <tr>
              <th scope="row">Return Visits: </th>
              <td><?php echo $display_data['rv_count_month']; ?></td>
            </tr>
            <tr>
              <th scope="row">Bible Studies: </th>
              <td><?php echo $display_data['study_count_month']; ?></td>
            </tr>
            <tr>
              <th scope="row">Other Hours: </th>
              <td><?php echo $display_data['other_hours_month']; ?></td>
            </tr>
          </tbody>
        </table>  
    </div>
</div>
</div>

<div id="statFade3">
<div class="stat_box_wrap">
	<h3>Your Year At a Glance...</h3>
    <div class="stat_box">
        <table width="200" border="0">
          <tbody>
            <tr>
              <th scope="row">Hours: </th>
              <td><?php echo $display_data['hours_year']; ?></td>
            </tr>
            <tr>
              <th scope="row">Magazines: </th>
              <td><?php echo $display_data['magazines_year']; ?></td>
            </tr>
            <tr>
              <th scope="row">Tracts: </th>
              <td><?php echo $display_data['tracts_year']; ?></td>
            </tr>
            <tr>
              <th scope="row">Brochures: </th>
              <td><?php echo $display_data['brochures_year']; ?></td>
            </tr>
            <tr>
              <th scope="row">Books: </th>
              <td><?php echo $display_data['books_year']; ?></td>
            </tr>
            <tr>
              <th scope="row">Return Visits: </th>
              <td><?php echo $display_data['rv_count_year']; ?></td>
            </tr>
            <tr>
              <th scope="row">Bible Studies: </th>
              <td><?php echo $display_data['study_count_year']; ?></td>
            </tr>
            <tr>
              <th scope="row">Other Hours: </th>
              <td><?php echo $display_data['other_hours_year']; ?></td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
</div>
