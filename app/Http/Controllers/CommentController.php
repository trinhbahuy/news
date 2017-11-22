<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
  public function getComment($id){

      $user = Auth::user()->name;

      echo " <div class='media'>
          <a class='pull-left' href='#'>
              <img class='media-object' src='http://placehold.it/64x64' alt=''>
          </a>
          <div class='media-body'>
              <h4 class='media-heading'>". $user ."
                  <small></small>
              </h4>" ;
}

  public function postComment($id, Request $request){
      $comment = new Comment;
      $comment->idTinTuc = $id;
      $comment->idUser = Auth::user()->id;
      $comment->NoiDung = $request['nd'];
      $comment->save();
  }
}
