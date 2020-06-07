//import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
//import { HomeComponent } from './home/home.component';
import {HTTP_INTERCEPTORS, HttpClientModule} from "@angular/common/http";
//import { LoginComponent } from './login/login.component';

/*import { AppComponent } from './app.component';
import { BookListComponent } from './book-list/book-list.component';
import { BookListItemComponent } from './book-list-item/book-list-item.component';
import { BookDetailsComponent } from './book-details/book-details.component';
import { BookStoreService } from './shared/book-store.service';
import {AppRoutingModule} from './app-routing.module';
import { BookFormComponent } from './book-form/book-form.component';
import { AuthService } from "./shared/authentication.service";
import {TokenInterceptorService} from "./shared/token-interceptor.service";
import {JwtInterceptorService} from "./shared/jwt-interceptor.service";

*/



@NgModule({
  declarations: [
    //AppComponent,
    //BookListComponent,
    //BookListItemComponent,
    //BookDetailsComponent,
   // HomeComponent,
    //BookFormComponent,
    //LoginComponent
  ],
  imports: [
    //AppRoutingModule, ReactiveFormsModule, BrowserModule
    HttpClientModule
  ],
  /*providers: [BookStoreService, AuthService,
    {
      provide : HTTP_INTERCEPTORS,
      useClass: TokenInterceptorService,
      multi: true
    },
    {
      provide : HTTP_INTERCEPTORS,
      useClass: JwtInterceptorService,
      multi: true
    },
  ],
  bootstrap: [AppComponent]*/
})
export class AppModule { }
