<?php session_start(); ?>
<div> 
	<form id="nvforma" class="formica">
		<table class="table">
			<thead>
				<tr>
					<th>Abstract </th>
					<th>Kandidat </th>
					<th>Tema </th>
					<th>Mentor </th>
					<th>Odobri </th>
					<th>Odbij </th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="teza in thesis">
					<td> {{ teza.abstract }} </td>
					<td> {{ teza.kandidat }} </td>
					<td> {{ teza.tema }} </td>
					<td> {{ teza.mentor }} </td>
					<?php 
						if(isset($_SESSION['username'])){
							if($_SESSION['titula']=='Dekan' || $_SESSION['titula']=='Docent'){
								echo "
									  <td><input type='radio' name='potvrdi' value='Odobri'></td>
									  <td><input type='radio' name='potvrdi' value='Odbij' checked></td>
									 ";
							}
						}
					?>
				</tr>
			</tbody>
		</table>
		<?php 
			if(isset($_SESSION['username'])){
				if($_SESSION['titula']=='Dekan' || $_SESSION['titula']=='Docent'){
					echo '<button type="button" class="btn btn-default btn-proslijedi" ng-click="potvrdiOdobravanja(thesis)">Proslijedi</button>';
				}
			}
		?>
	</form>
	<?php 
		if(isset($_SESSION['username'])){
			if($_SESSION['username']=='nalfirevic' && $_SESSION['titula']=='kadrovska'){
				echo '<button type="button" class="btn btn-default btn-proslijedi" ng-click="proslijediZavrsne(thesis)">Proslijedi</button>';
			}
		}
	?>

	
</div>