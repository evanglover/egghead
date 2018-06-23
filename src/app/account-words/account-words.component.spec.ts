import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AccountWordsComponent } from './account-words.component';

describe('AccountWordsComponent', () => {
  let component: AccountWordsComponent;
  let fixture: ComponentFixture<AccountWordsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AccountWordsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AccountWordsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
