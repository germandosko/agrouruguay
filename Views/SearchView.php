<?php

/**
 * @author			German Dosko
 * @version			March 6, 2013
 * @filesource		/Views/SearchView.php
 */
class SearchView{
	
	/**
	 * Returns an html string containing Machineries and Estates 
	 * results with the proper view format
	 * 
	 * @static		static
	 * @param		string		$q;
	 * @return		string
	 */
	public static function RenderAll($q){
		$q = htmlentities(utf8_decode(trim($q)), ENT_COMPAT, 'UTF-8', false);
		$html = '<div id="lock">No hay resultados para mostrar</div>';
		if(!empty($q)){
			$results = array('left'=>'', 'right'=>'');
			$machineries = MachineryModel::Search(array('text'=>trim($q), 'fields'=>array('title', 'description')));
			$estates = EstateModel::Search(array('text'=>$q, 'fields'=>array('title', 'description')));
			$lists = array_merge(MachineriesView::ParseResults($machineries), EstatesView::ParseResults($estates));
			if(!empty($lists)){
				$i = 1;
				foreach($lists as $listHtml){
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
		}
		return $html;
	}
}