<?php

/**
 * @author			German Dosko
 * @version			March 6, 2013
 * @filesource		/Views/AdminView.php
 */
class AdminView{
	
	/**
	 * Returns an html string containing the proper form
	 * 
	 * @static	static
	 * @return	string
	 */
	public static function RenderForm($type, $id, $formValues){
		$form = $sent = false;
		$type = strtolower(trim($type));
		if(is_numeric($id) && (intval($id) >= 0) && !empty($type)){
			switch($type){
				case 'maquinaria':
					$entity = new Machinery();
					$entity->setId(intval($id));
					$entity->setPhoto(new Photo(array('id'=>1)));
					$entity->setActive(1);
					if(!empty($formValues) && isset($formValues['title']) && isset($formValues['description'])){
						$entity->setTitle(trim($formValues['title']));
						$entity->setDescription(trim($formValues['description']));
						$sent = true;
					}
					$form = MachineriesView::RenderForm($entity, $sent);
					break;
				case 'inmueble':
					$entity = new Estate();
					$entity->setId(intval($id));
					$entity->setType(TypeModel::FindById(1));
					$entity->setPhoto(new Photo(array('id'=>1)));
					$entity->setActive(1);
					if(!empty($formValues) && isset($formValues['type']) && isset($formValues['title']) && isset($formValues['description'])){
						$entity->setType(TypeModel::FindById(intval($formValues['type'])));
						$entity->setTitle(trim($formValues['title']));
						$entity->setDescription(trim($formValues['description']));
						$sent = true;
					}
					$form = EstatesView::RenderForm($entity, $sent);
					break;
				case 'asociado':
					$entity = new Partner();
					$entity->setId(intval($id));
					$entity->setPremium(1);
					$entity->setPhoto(new Photo(array('id'=>1)));
					$entity->setActive(1);
					if(!empty($formValues) && isset($formValues['title']) && isset($formValues['description']) && isset($formValues['premium'])){
						$entity->setTitle(trim($formValues['title']));
						$entity->setDescription(trim($formValues['description']));
						$entity->setPremium(intval($formValues['premium']));
						$sent = true;
					}
					$form = PartnersView::RenderForm($entity, $sent);
					break;
			}
		}
		return $form;
	}
}