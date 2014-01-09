<?php

/**
 * @author			German Dosko
 * @version			March 6, 2013
 * @filesource		/Views/PartnersView.php
 */
class PartnersView{
	
	/**
	 * Returns an html string containing Partners
	 * results with the proper view format
	 * 
	 * @static	static
	 * @return	string
	 */
	public static function RenderAll(){
		$html = '<div id="lock">No hay resultados para mostrar</div>';
		$results = array('left'=>'', 'right'=>'');
		$partners = PartnerModel::FindBy(array('active'=>1));
		if(!empty($partners)){
			$i = 1;
			foreach($partners as $partner){
				$listHtml = "\t\t\t\t\t\t".'<li class="ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">'."\n";
				$photo = $partner->getPhoto();
				if(!empty($photo)){
					$listHtml .= "\t\t\t\t\t\t\t".'<img class="logo" src="'.$photo->getUrl().'" alt="'.$photo->getAlt().'" />'."\n";
				} else {
					$listHtml .= "\t\t\t\t\t\t\t".'<img class="logo" src="img/favicon.png" alt="Logo" />'."\n";
				}
				$listHtml .= "\t\t\t\t\t\t\t".'<div class="info">'."\n";
				$listHtml .= "\t\t\t\t\t\t\t\t".'<h3>'.$partner->getTitle().'</h3>'."\n";
				$listHtml .= "\t\t\t\t\t\t\t\t".'<p>'.nl2br($partner->getDescription()).'</p>'."\n";
				$listHtml .= "\t\t\t\t\t\t\t".'</div>'."\n";
				$listHtml .= "\t\t\t\t\t\t\t".'<div class="clearfix"></div>'."\n";
				$listHtml .= "\t\t\t\t\t\t".'</li>'."\n";
				if($i%2){
					$results['left'] .= $listHtml;
				} else {
					$results['right'] .= $listHtml;
				}
				++$i;
			}
			$html = '<div class="left">';
			$html .= "\t\t\t\t\t".'<ul>'."\n";
			$html .= $results['left'];
			$html .= "\t\t\t\t\t".'</ul>'."\n";
			$html .= "\t\t\t\t".'</div>'."\n";
			$html .= "\t\t\t\t".'<div class="right">'."\n";
			$html .= "\t\t\t\t\t".'<ul>'."\n";
			$html .= $results['right'];
			$html .= "\t\t\t\t\t".'</ul>'."\n";
			$html .= "\t\t\t\t".'</div>'."\n";
			$html .= "\t\t\t\t".'<div class="clearfix"></div>'."\n";
		}
		return $html;
	}
	
	/**
	 * Returns an html string containing Partners
	 * results with the proper view format
	 * 
	 * @static	static
	 * @return	string
	 */
	public static function RenderAdminList(){
		$html = "\t\t\t\t\t".'<table>'."\n";
		$html .= "\t\t\t\t\t\t".'<thead>'."\n";
		$html .= "\t\t\t\t\t\t\t".'<tr>'."\n";
		$html .= "\t\t\t\t\t\t\t\t".'<th>T&iacute;tulo</th>'."\n";
		$html .= "\t\t\t\t\t\t\t\t".'<th>Descripci&oacute;n</th>'."\n";
		$html .= "\t\t\t\t\t\t\t\t".'<th>Foto</th>'."\n";
		$html .= "\t\t\t\t\t\t\t\t".'<th>Premium</th>'."\n";
		$html .= "\t\t\t\t\t\t\t\t".'<th class="options"></th>'."\n";
		$html .= "\t\t\t\t\t\t\t".'</tr>'."\n";
		$html .= "\t\t\t\t\t\t".'</thead>'."\n";
		$html .= "\t\t\t\t\t\t".'<tbody>'."\n";
		$partners = PartnerModel::FindBy(array('active'=>1));
		foreach($partners as $partner){
			$html .= "\t\t\t\t\t\t\t".'<tr class="id'.$partner->getId().'">'."\n";
			$html .= "\t\t\t\t\t\t\t\t".'<td class="text">'.$partner->getTitle().'</td>'."\n";
			$html .= "\t\t\t\t\t\t\t\t".'<td class="text">'.nl2br($partner->getDescription()).'</td>'."\n";
			if($partner->getPremium()){
				$html .= "\t\t\t\t\t\t\t\t".'<td><a href="imagen.html?tipo=asociado&id='.$partner->getId().'" title="Click para cambiar la foto"><img src="'.$partner->getPhoto()->getUrl().'" alt="'.$partner->getPhoto()->getAlt().'" width="75" /></a></td>'."\n";
				$html .= "\t\t\t\t\t\t\t\t".'<td>Si</td>'."\n";
			} else {
				$html .= "\t\t\t\t\t\t\t\t".'<td> - </td>'."\n";
				$html .= "\t\t\t\t\t\t\t\t".'<td>No</td>'."\n";
			}
			$html .= "\t\t\t\t\t\t\t\t".'<td class="options">'."\n";
			$html .= "\t\t\t\t\t\t\t\t\t".'<a href="guardar.html?tipo=asociado&id='.$partner->getId().'" title="Editar"><img src="img/edit.png" width="32" alt="Editar" /></a>'."\n";
			$html .= "\t\t\t\t\t\t\t\t\t".'<a href="eliminar.html?tipo=asociado&id='.$partner->getId().'" class="delete" title="Eliminar"><img src="img/delete.png" width="32" alt="Eliminar" /></a>'."\n";
			$html .= "\t\t\t\t\t\t\t\t".'</td>'."\n";
			$html .= "\t\t\t\t\t\t\t".'</tr>'."\n";
		}
		$html .= "\t\t\t\t\t\t\t".'<tr>'."\n";
		$html .= "\t\t\t\t\t\t\t\t".'<td colspan="6" class="options"><a href="guardar.html?tipo=asociado&id=0" title="Insertar"><img src="img/add.png" alt="Insertar" width="32" /></a></td>'."\n";
		$html .= "\t\t\t\t\t\t\t".'</tr>'."\n";
		$html .= "\t\t\t\t\t\t".'</tbody>'."\n";
		$html .= "\t\t\t\t\t".'</table>'."\n";
		return $html;
	}
	
	/**
	 * Returns an html string containing the partner save form
	 * 
	 * @static	static
	 * @return	string
	 */
	public static function RenderForm($partner, $sent){
		//prepare data
		$success = '';
		$maxlength = 256;
		$id = $partner->getId();
		$title = $partner->getTitle();
		$description = $partner->getDescription();
		$errors = $content = array('id'=>$id, 'title'=>'', 'description'=>'');
		$dbPartner = false;
		//find in database
		if($id > 0){
			$dbPartner = PartnerModel::FindById($id);
			if(!empty($dbPartner)){
				$partner->setPhoto($dbPartner->getPhoto());
				$partner->setPremium($dbPartner->getPremium());
				if(empty($title)){
					$content['title'] = DataConverter::PhpToForms($dbPartner->getTitle());
				}
				if(empty($description)){
					$content['description'] = DataConverter::PhpToForms($dbPartner->getDescription()); 
				}
			} else {
				return false; //TODO: catch when the object is not found
			}
		}
		//if sent and is valid then save, otherwise show errors
		if($sent){
			if(!empty($title) && strlen($title) <= $maxlength && !empty($description)){
				try{
					PartnerModel::Save($partner);
					header('Location: admin.html#partners');
				} catch (Exception $e) {
					$success = "\t\t\t\t\t\t\t".'<p class="error"><img src="img/error.png" alt="Error" />Error al guardar la asociado</p>'."\n";
				}
			} else {
				if(empty($title) || strlen($title) > $maxlength){
					$errors['title'] = "\t\t\t\t\t".'<p class="error"><img src="img/error.png" alt="Error" />Debe ingresar un t&iacute;tulo de hasta '.$maxlength.' caracteres.</p>'."\n";;
				} else {
					$content['title'] = trim($title);
				}
				if(empty($description)){
					$errors['description'] = "\t\t\t\t\t".'<p class="error"><img src="img/error.png" alt="Error" />Debe ingresar una descripci&oacute;n.</p>'."\n";
				} else {
					$content['description'] = trim($description);
				}
			}
		}
		//render form
		$html = '<fieldset class="ui-corner-all">'."\n";
		$html .= "\t\t\t\t\t".'<label for="title">T&iacute;tulo</label>'."\n";
		$html .= "\t\t\t\t\t".'<input type="text" maxlength="'.$maxlength.'" value="'.$content['title'].'" name="title" class="ui-widget ui-widget-content ui-corner-all" />'."\n";
		$html .= $errors['title'];
		$html .= "\t\t\t\t\t".'<label for="description">Descripci&oacute;n</label>'."\n";
		$html .= "\t\t\t\t\t".'<textarea name="description" class="ui-widget ui-widget-content ui-corner-all">'.$content['description'].'</textarea>'."\n";
		$html .= $errors['description'];
		$html .= "\t\t\t\t\t".'<label for="premium">Premium</label>'."\n";
		if($partner->getPremium()){
			$html .= "\t\t\t\t\t".'Si <input type="radio" name="premium" value="1" checked="checked" class="ui-widget ui-widget-content ui-corner-all" />'."\n";
			$html .= "\t\t\t\t\t".'No <input type="radio" name="premium" value="0" class="ui-widget ui-widget-content ui-corner-all" />'."\n";
		} else {
			$html .= "\t\t\t\t\t".'Si <input type="radio" name="premium" value="1" class="ui-widget ui-widget-content ui-corner-all" />'."\n";
			$html .= "\t\t\t\t\t".'No <input type="radio" name="premium" value="0" checked="checked" class="ui-widget ui-widget-content ui-corner-all" />'."\n";
		}
		$html .= "\t\t\t\t\t".'<label></label>'."\n";
		$html .= "\t\t\t\t\t".'<input type="submit" value="Enviar" class="ui-widget ui-widget-content ui-corner-all" />'."\n";
		$html .= "\t\t\t\t\t".'<a href="admin.html#estates" title="Volver" class="exit"><img src="img/undo.png" width="32" alt="Volver" /></a>'."\n";
		$html .= $success;
		$html .= "\t\t\t\t".'</fieldset>'."\n";
		return $html;
	}
}