<?php

namespace App\Http\Controllers;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Slist;
use App\Item;
use App\Feedback;

class SlistController extends Controller
{
    /**
     * @var int
     */
    private $helper_id;

    public function index()
    {
        /* load all books and relations with eager loading,
        which means "load all related objects" */
        $slists = Slist::with('user')
            ->get();
        return $slists;
    }
    public function findListById(int $id)
    {
        $slist = Slist::with(['user'])
            ->where('id', $id)->first();
        return $slist;
    }
    public function findItemsOfList(int $list_id){
        //Speichern eines Items - list_id
        $items = Item::where('slist_id', $list_id)
            ->get();
        return $items;
    }

    //Findet die fertigen bzw noch offenen(abgearbeiteten Listen
    public function findDone ( string $isDone ) {
        $slist = Slist::with(['user'])
            ->where('done', 'LIKE', '%' . $isDone . '%')
            ->get();
        return $slist;
    }
    public function newFeedback(Request $request): JsonResponse
    {
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $feedback= Feedback::create($request->all());

            DB::commit();
            return response()->json($feedback, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('saving feedback failed ' . $e->getMessage(), 420); //420 something is found but nothing happens
        }
    }

    public function save(Request $request): JsonResponse
    {
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $slist = Slist::create($request->all());
            $slist->save();
            // save Items
            if (isset($request['items'])) {

            foreach ($request['items'] as $it) {
            $item = Item::firstOrNew([
                'name' => $it['name'],
                'amount' => $it['amount'],
                'maxPrice' => $it['maxPrice'],
            ]);
            // assign item to list
            $slist->items()->save($item);
            }
            }

            // save authors
            /* if ($request['authors'] && is_array($request['authors'])) {
                 foreach ($request['authors'] as $aut) {
                     $author = Author::firstOrNew([
                         'firstName' => $aut['firstName'],
                         'lastName' => $aut['lastName']
                     ]);

                     // assign image to book
                     $book->authors()->save($author);
                 }
             }*/
            DB::commit();
            return response()->json($slist, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('saving list failed '.$e->getMessage(), 420); //420 something is found but nothing happens
        }
    }

    private function parseRequest(Request $request): Request
    {
        $date = new \DateTime($request->published);
        $request['published'] = $date;
        return $request;
    }
    public function delete(string $id): JsonResponse
    {
        $slist = Slist::with(['user'])
            ->where('id', $id)->first();

        if($slist != null){
            $slist->delete();
        } else {
            throw new \Exception("LIST could not be deleted - does not exist");
        }
        return response()->json('slist '.$slist.' deleted', 200);
    }

public function saveInTakenLists($id){
        /*$userId = Auth::id();
    $record = DB::table('slists')
        ->where("slists.id",  $id);
    $record->helper_id = 1;
    $record->save();*/
    $gift = Input::all();

    // Use Eloquent to grab the gift record that we want
    // to update, referenced by the ID passed to the REST endpoint
    $slist = Slist::find($id);

    $slist->name = $gift['name'];
    $slist->duedate = $gift['duedate'];
    $slist->done = $gift['done'];
    $slist->creator_id = $gift['creator_id'];
    $slist->helper_id = $gift[6];

    $slist->save();

}
//------------------------------------------------------------------------------

    //Update die liste in der Datenbank
      public function update(Request $request, string $id): JsonResponse
      {
          DB::beginTransaction();
          try {
              //Get logged-in User.id
              //TODO
              $userId = Auth::id();

              $slist = Slist::with(['user'])
                  ->where('id', $id)->first();

              if ($slist != null) {
                  $request = $this->parseRequest($request);
                  $slist->update($request->all());
                  //delete all old images
                  //$slist->images()->delete();

                  // save images
                 /* if (isset($request['images']) && is_array($request['images'])) {
                      foreach ($request['images'] as $img) {
                          $image =
                              Image::firstOrNew(['url'=>$img['url'],'title'=>$img['title']]);
                          $slist->images()->save($image);
                      }
                  }
                  //update authors
                  $ids = [];
                  if (isset($request['authors']) && is_array($request['authors'])) {
                      foreach ($request['authors'] as $auth) {
                          array_push($ids,$auth['id']);
                      }
                  }
                  $slist->authors()->sync($ids);*/
                  $slist->save();
              }
              DB::commit();
              $slist1 = Slist::with(['user'])
                  ->where('id', $id)->first();
              // return a vaild http response
              return response()->json($slist1, 201);
          }
          catch (\Exception $e) {
              // rollback all queries
              DB::rollBack();
              return response()->json("updating list failed: " . $e->getMessage(), 420);
          }
      }
    public function getListsOfUser(string $user_id, string $id)
    {
        $order = Slist::where('user_id', $user_id)->where('id', $id)
            ->get();
        return $order;
    }

}
