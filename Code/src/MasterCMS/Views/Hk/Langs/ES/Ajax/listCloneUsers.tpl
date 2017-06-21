<?php 
	if ($this->hotel->getMasterType() == 'min' && $this->hotel->getMasterType($users_rank) == 'medium' || $this->hotel->getMasterType() == 'min' && $this->hotel->getMasterType($users_rank) == 'max' || $this->hotel->getMasterType() == 'medium' && $this->hotel->getMasterType($users_rank) == 'max' || $this->hotel->getMasterType() == 'max' && $this->hotel->getMasterType($users_rank) == 'max' && $users_username != $user_username && $users_rank > $user_rank) {
		$access = false;
	} else {
		$access = true;
	}
?>
<tr>
	<td>{@users_id}</td>
	<td>{@users_username}</td>
	<td>{@users_rank_name}</td>
	<td><img src="{@hk_cdn}/img/flags/{@users_country}.png"></td>
	<td><img src="{@hk_cdn}/img/{@users_status}.gif" style="width: auto;"></td>
	<?php if ($access) { ?>
	<td>{@users_ip_last}</td>
	<?php } else { ?>
	<td>You can't watch this</td>
	<?php } ?>
	<?php if ($access) { ?>
	<td>{@users_ip_reg}</td>
	<?php } else { ?>
	<td>You can't watch this</td>
	<?php } ?>
	<?php if ($access) { ?>
	<td class="td-actions text-right">
		<a href="{@url}/hk/web/users/{@users_id}" title="Editar" class="btn btn-success btn-simple btn-xs"">
			<i class="material-icons">edit</i>
		</a>
	</td>
	<?php } else { ?>
	<td>You can't modify this user</td>
	<?php } ?>
</tr>