<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\content;
use App\isi_content;
use App\post;
use App\tabContent;

class C_content extends Controller
{
	function __construct()
	{
		$content = new Content();
		$content->delMenu();
	}
	function menuList()
	{
		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();
		$data['list'] 	= content::all();
		$data['parent'] = content::where('parent','0')->get();
		return view('admin.menu.menuList',compact('data'));
	}

	function getParent()
	{
		$data['parent'] = content::orderBy('idContent','ASC')->get();
		$html = "<label>Parent</label>
		<select class='form-control' required='' name='parent'>
		<option value=''>Pilih Parent</option>";
		foreach ($data['parent'] as $key){
			$html.="<option value='".$key->idContent."'>".$key->contentName."</option>";
		}
		$html.="</select>";
		echo $html;
	}

	function addMenu(Request $req)
	{
		$parent;
		$queue;
		$parentName="";
		$grandpa;
		$stat=0;
		
		$queue      = content::max('queue') + 1;
		$parent = '0';

		$photo	= $req->file('banner');
		$name 	='bannerContent_'.$req->contentName.'_'.time().'.'.$photo->getClientOriginalExtension();
		$folder = public_path('assets/konten/bannerContent/');
		$photo->move($folder,$name);

		// $rules   = [
		// 	'contentName'	=>'unique:contents',
		// 	'banner'		=>'image|mimes:jpeg,jpg,png',
		// ];
		// $costume = [
		// 	'contentName.unique'	=>'Content dengan nama tersebut telah tersedia!',
		// 	'banner.image'			=>'File harus berupa Photo',
		// 	'banner.mimes'			=>'Photo harus berekstensi jpg,jpeg,png'
		// ];
		// $this->validate($req,$rules,$costume);
		if ($stat==0) {

			content::create([
				'parent' 		=> $parent,
				'parentName' 	=> $parentName,
				'type'			=> $req->type,
				'contentName' 	=> $req->contentName,
				'banner' 		=> $name,
				'title_banner' 	=> $req->title,
				'queue' 		=> $queue,
				'activeLink'	=> 1,
				'publish'		=> 0,
				'createdBy'		=> session('id'),
				'slug'			=> strtolower(str_replace(' ', '-', $req->contentName))
			]);
			session::flash('success','Content telah di tambahkan');
			return back();
		}else{
			session::flash('error','Sub Content telah mencapai batas maksimal');
			return back();
		}

	}

	function delMenu($id)
	{
		content::where('idcontent',$id)->delete();
		session::flash('success','Content Telah dihapus');
		return back();
	}

	function updMenu(Request $req,$id)
	{
		$rules   = [
			'contentName'=>'unique:contents',
		];
		$costume = [
			'contentName.unique'	=>'Content dengan nama tersebut telah tersedia!'
		];
		$this->validate($req,$rules,$costume);
		content::where('idContent',$id)->update([
			'contentName' => $req->contentName,
			'slug'		  => strtolower(str_replace(' ', '-', $req->contentName))

		]);
		session::flash('success','Content telah diubah!');
		return back();
	}
	function activeLink($id,$stat)
	{
		content::where('idContent',$id)->update([
			'activeLink' => $stat,
		]);
		// return "a";
		return bacK();
	}

	function publish($id,$stat)
	{
		content::where('idContent',$id)->update([
			'publish' => $stat,
		]);
		// return "a";
		return bacK();
	}



	function subMenu($id)
	{
		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();
		$data['list'] 	= content::all();
		$data['listsubmenu'] = content::where('parent',$id)->get();
		$data['parent'] = content::where('idContent',$id)->get();
		return view('admin.menu.submenuList',compact('data'));
	}

	function addsubMenu(Request $req,$id)
	{
		$parent = content::where('idContent',$id)->first();
		$queue;
		$parentName="";
		$grandpa;

		
		$queue      = content::where('parent',$id)->max('queue') + 1;
		$rules   = [
			'contentName'=>'unique:contents',
		];
		$costume = [
			'contentName.unique'	=>'Content dengan nama tersebut telah tersedia!'
		];
		$this->validate($req,$rules,$costume);

		content::create([
			'parent' 		=> $id,
			'parentName' 	=> $parent->contentName,
			'contentName' 	=> $req->contentName,
			'queue' 		=> $queue,
			'activeLink'	=> 1,
			'publish'		=> 0,
			'createdBy'		=> session('id'),
			'slug'			=> strtolower(str_replace(' ', '-', $req->contentName))
		]);
		session::flash('success','Content telah di tambahkan');
		return back();
	}


	function updsubMenu(Request $req,$id)
	{
		$rules   = [
			'contentName'=>'unique:contents',
		];
		$costume = [
			'contentName.unique'	=>'Content dengan nama tersebut telah tersedia!'
		];
		$this->validate($req,$rules,$costume);
		content::where('idContent',$id)->update([
			'contentName' => $req->contentName,
			'slug'		  => strtolower(str_replace(' ', '-', $req->contentName))
		]);
		session::flash('success','Content telah diubah!');
		return back();
	}

	function contentPost()
	{
		return view('admin.content.contentPost');
	}

	function postList($id)
	{
		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();
		$data['menu']		= content::where('idContent',$id)->first();
		$data['post']		= post::where('idMenu',$id)->where('type','Post')->get();
		$data['list']		= post::where('idMenu',$id)->where('type','List')->get();
		$data['headlineList']=tabContent::whereRaw("idMenu = $id and type = 'List' or idMenu = $id and type = 'Report'  ")->get();
		$data['album']		= tabContent::where('idMenu',$id)->where('type','Anabatician')->get(); 
		$data['projek']    = isi_content::all();
		
		return view('admin.menu.postList',compact('data'));
	}

	function addPost($id)
	{
		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();
		$data['menu']		= content::where('idContent',$id)->first();
		return view('admin.menu.addPost',compact('data'));
	}

	function uploadPost(Request $req, $id)
	{	
		$banner="";
		if ($req->hasFile('banner')) {
			$foto = $req->file('banner');
			$banner = "Post-".time().".".$foto->getClientOriginalExtension();
			$folder = public_path('assets/konten/bannerPost/');
			$foto->move($folder,$banner);
		}else{
			$banner = "";
		}
		$queue = post::where('idMenu',$id)->where('type','Post')->max('queue') + 1;
		tabContent::create([
			'idMenu'	=>$id,					'headline'		=> $req->headline,
			'activeLink'=>'1',					'publish'		=> '0',
			'createdBy'	=>session::get('id'),	'updatedBy'		=> '0',
			'type'		=>'Post',				'queue'			=> tabContent::where('idMenu',$id)->max('queue') + 1			
		]);
		$idtab = tabContent::max('idTab');
		post::create([
			'idMenu'	=>$id,					'type'			=> 'Post',
			'title'		=>$req->title,			'headline'		=> $req->headline,
			'sortDesc'	=> '-',					'kontenImage'	=> $banner,
			'content'	=>$req->content,		'queue'			=> $queue,
			'activeLink'=>'1',					'publish'		=> '0',
			'createdBy'	=>session::get('id'),	'updatedBy'		=> '0',
			'idTab'		=>$idtab,				'slug'			=>  preg_replace('/[^A-Za-z0-9\-]/', '',strtolower(str_replace(' ', '-', $req->title))) 
		]);
		session::flash('success','Post berhasil dibuat!');
		return redirect('postList/'.$id);
	}

	function delPost($id)
	{	
		$idTab 	= post::where('idPost',$id)->first();
		post::where('idPost',$id)->delete();
		tabContent::where('idTab',$idTab->idTab)->delete();
		session::flash('error','Post berhasil dihapus!');
		return back();
	}

	function activeLinkContent($id,$stat)
	{
		$post  = post::where('idPost',$id)->first();
		tabContent::where('idTab',$post->idTab)->update([
			'activeLink' => $stat,
		]);
		post::where('idPost',$id)->update([
			'activeLink' => $stat,
		]);
		// return "a";
		return bacK();
	}

	function publishContent($id,$stat)
	{	
		$post  = post::where('idPost',$id)->first();
		tabContent::where('idTab',$post->idTab)->update([
			'publish' => $stat,
		]);
		post::where('idPost',$id)->update([
			'publish' => $stat,
		]);

		// return "a";
		return bacK();
	}

	function addHeadline(Request $req,$id)
	{
		$desc = "";
		$title="";
		if ($req->type=="Report") {
			$desc = $req->descReport;
			$title = $req->reportTitle; 
		}elseif($req->type=="Anabatician"){
			$desc = $req->descReport;
			$title= "";
		}
		$queue = tabContent::where('idMenu',$id)->where('type','LIst')->max('queue') + 1;
		tabContent::create([
			'idMenu'	=>$id,					'headline'		=> $req->headline,
			'activeLink'=>'1',					'publish'		=> '0',
			'createdBy'	=>session::get('id'),	'updatedBy'		=> '0',
			'type'		=>$req->type,			'queue'			=> $queue,
			'reportTitle'=>$title,				'descReport'	=> $desc	
		]);	
		session::flash('success','Headline telah dibuat!');
		return redirect('postList/'.$id);

	}

	function activeLinkHeadline($id,$stat)
	{
		tabContent::where('idTab',$id)->update([
			'activeLink' => $stat,
		]);
		return bacK();
	}

	function publishHeadline($id,$stat)
	{	
		tabContent::where('idTab',$id)->update([
			'publish' => $stat,
		]);
		return bacK();
	}

	function delHeadline($id)
	{	
		tabContent::where('idTab',$id)->delete();
		session::flash('error','Headline berhasil dihapus!');
		return back();
	}

	function activeLinkList($id,$stat)
	{
		post::where('idPost',$id)->update([
			'activeLink' => $stat,
		]);
		return bacK();
	}

	function publishList($id,$stat)
	{	
		post::where('idPost',$id)->update([
			'publish' => $stat,
		]);
		return bacK();
	}

	function delList($id)
	{	
		post::where('idPost',$id)->delete();
		session::flash('error','Headline berhasil dihapus!');
		return back();
	}

	function addList($id)
	{
		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();
		$data['headline']	= tabContent::where('idTab',$id)->first();
		$data['list']		= post::where('idTab',$id)->get();
		return view('admin.menu.listList',compact('data'));	
	}

	function addNewList($id)
	{
		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();
		$data['headline']	= tabContent::where('idTab',$id)->first();
		return view('admin.menu.addList',compact('data'));	
	}

	function uploadList(Request $req,$id)
	{
		$banner="";
		if ($req->hasFile('banner')) {
			$foto = $req->file('banner');
			$banner = "Artikel-".time().".".$foto->getClientOriginalExtension();
			$folder = public_path('assets/konten/thumbnail/');
			$foto->move($folder,$banner);
		}else{
			$banner = "";
		}
		$queue = post::where('idTab',$id)->where('type','List')->max('queue') + 1;
		$idMenu= tabContent::where('idTab',$id)->first();
		post::create([
			'idMenu'	=>$idMenu->idMenu,		'type'			=> 'List',
			'title'		=>$req->title,			'headline'		=> $idMenu->headline,
			'sortDesc'	=>$req->sortDesc,		'kontenImage'	=> $banner,
			'content'	=>$req->content,		'queue'			=> $queue,
			'activeLink'=>'1',					'publish'		=> '0',
			'createdBy'	=>session::get('id'),	'updatedBy'		=> '0',
			'idTab'		=>$id,					'slug'			=> preg_replace('/[^A-Za-z0-9\-]/', '',strtolower(str_replace(' ', '-', $req->title))) 
		]);
		session::flash('success','Post berhasil dibuat!');
		return redirect('add-list/'.$id);	
	}

	function addNewReport($id)
	{
		$data['parentNav'] 	= content::where('parent',0)->get();
		$data['childNav']	= content::all();
		$data['headline']	= tabContent::where('idTab',$id)->first();
		return view('admin.menu.addReport',compact('data'));	
	}

	function uploadReport(Request $req,$id)
	{
		$pdf="";
		$nama="";
		if ($req->hasFile('pdf')) {
			$pdf = $req->file('pdf');
			$nama = "PDFRerport-".time().".".$pdf->getClientOriginalExtension();
			$folder = public_path('assets/konten/pdf/');
			$pdf->move($folder,$nama);
		}else{
			$pdf = "";
		}
		$queue = post::where('idTab',$id)->where('type','Report')->max('queue') + 1;
		$idMenu= tabContent::where('idTab',$id)->first();
		post::create([
			'idMenu'	=>$idMenu->idMenu,		'type'			=> 'Report',
			'title'		=>$req->title,			'headline'		=> $idMenu->headline,
			'sortDesc'	=>'',					'kontenImage'	=> '',
			'content'	=>'',					'queue'			=> $queue,
			'activeLink'=>'1',					'publish'		=> '0',
			'createdBy'	=>session::get('id'),	'updatedBy'		=> '0',
			'idTab'		=>$id,					'slug'			=> preg_replace('/[^A-Za-z0-9\-]/', '',strtolower(str_replace(' ', '-', $req->title))) ,
			'pdf'		=>$nama,				'reportDate'	=> $req->reportDate
		]);
		session::flash('success','Post berhasil dibuat!');
		return redirect('add-list/'.$id);	
	}

	function AddProjek(Request $req, $id)
	{
		$photo	= $req->file('thumbnail');
		$name 	='Thumbnail_'.$req->projek.'_'.time().'.'.$photo->getClientOriginalExtension();
		$folder = public_path('assets/konten/thumbnail/');
		$photo->move($folder,$name);

		// $rules   = [
		// 	'contentName'	=>'unique:contents',
		// 	'banner'		=>'image|mimes:jpeg,jpg,png',
		// ];
		// $costume = [
		// 	'contentName.unique'	=>'Content dengan nama tersebut telah tersedia!',
		// 	'banner.image'			=>'File harus berupa Photo',
		// 	'banner.mimes'			=>'Photo harus berekstensi jpg,jpeg,png'
		// ];
		// $this->validate($req,$rules,$costume);
		isi_content::create([
			'idMenu'		=> $id,
			'projek_name' 	=> $req->projek,
			'desc' 			=> $req->desc,
			'thumbnail' 	=> $name
		]);
		session::flash('success','Content telah di tambahkan');
		return back();
	}

	function delProjek($id)
	{
		isi_content::where('idPost',$id)->delete();
		session::flash('error','Headline berhasil dihapus!');
		return back();
	}
}

