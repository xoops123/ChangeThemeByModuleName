<?php
/**
 * @file ChangeThemeByModuleName.class.php
 * @package For legacy Cube Legacy 2.2
 * @version $Id: ChangeThemeByModuleName.class.php ver0.03 2013/2/6  00:00:00 marine  $
 */
class ChangeThemeByModuleName extends XCube_ActionFilter
{
	public function postFilter()
	{
		$dirname = null;
		$themePath = null;

		if ( isset($this->mRoot->mContext->mModule->mXoopsModule) and  is_object($this->mRoot->mContext->mModule->mXoopsModule) ) {

			$dirname = $this->mRoot->mContext->mModule->mXoopsModule->get('dirname');
			$themePath = XOOPS_THEME_PATH."/".$dirname;

		}
		// モジュールのディレクトリ名 dirname と 同じテーマがある場合、それを適用する
		if (is_dir($themePath)) {
				$themeName = $dirname;
		}

		if(isset($themeName)){
			$this->mRoot->mContext->setThemeName($themeName);
		}

	}
}
