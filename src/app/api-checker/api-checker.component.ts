import { Component, OnInit } from '@angular/core';

import { ApiCheckerService } from '../api-checker.service';

@Component({
  selector: 'app-api-checker',
  templateUrl: './api-checker.component.html',
  styleUrls: ['./api-checker.component.css']
})
export class ApiCheckerComponent implements OnInit {
  apiCheck: any;

  constructor(
  	private apiCheckerService: ApiCheckerService
  	) { }

  ngOnInit() {
  	this.getApiCheck();
  }

  getApiCheck(): void{
  	this.apiCheckerService.getApiCheck()
  	.subscribe(data => {

             var res = data; //if you are getting JSON in a string, else do res = data;
             console.log(res);
             this.apiCheck = res;
             }
         );
  }
}
