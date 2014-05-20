				</td>
			</tr>
			<tr>
				<td>
					<p style="text-align: right;"><?php
					session_start();
					if ($_SESSION['power'] == "99")
					{
						?><a href="admin/index.php">Panneau d'admin</a> - <?php
					}
					if ($_SESSION['loggued_on_user'])
					{
						?><a href="modif_user.php">Modifer son mot de passe</a> - <a href="delete_user.php">Supprimer son compte</a> <?php
					}
					?>
					© twallart - ael-kadh</p>
				</td>
			</tr>
		</table>
	</body>
</html>

<?php
	mysqli_close($con);
?>