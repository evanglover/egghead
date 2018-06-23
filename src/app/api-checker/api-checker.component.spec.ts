import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ApiCheckerComponent } from './api-checker.component';

describe('ApiCheckerComponent', () => {
  let component: ApiCheckerComponent;
  let fixture: ComponentFixture<ApiCheckerComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ApiCheckerComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ApiCheckerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
