create table users (
   userId int not null primary key auto_increment,
   username varchar(30) not null unique,
   email varchar(255) not null unique,
   password varchar(255) not null,
   role enum ("USER", "ADMIN") default ("USER")
);

create table projects (
  projectId int not null primary key auto_increment,
  name_project varchar(255), 
  description  varchar(255)
);

create table testingtypes (
  testingTypeId int not null primary key auto_increment,
  testingType varchar(50) not null unique
);

create table errorTypes (
  errorTypeId int not null primary key auto_increment,
  errorType varchar(50) not null unique
);



CREATE TABLE Errors (
  ErrorID INT PRIMARY KEY auto_increment,
  ErrorName VARCHAR(255), # tên lỗi
  Description VARCHAR(255), # mô tả lỗi
  ResponsibleDeveloperID INT,  # người chịu trách nhiệm lỗi
  UserCreatedID INT , 
  StepsToReproduce VARCHAR(255), #các bước tái hiện lỗi
  ExpectedResult VARCHAR(255), # kết quả mong đợi
  ActualResult VARCHAR(255), # kết quả thực tế
  IllustrativeImage VARCHAR(255), # ảnh minh hoạ
  PriorityLevel ENUM ("HIGH", "MEDIUM", "LOW") default ("LOW"), # mức độ ưu tiên lỗi
  Status ENUM ("ERROR", "PENDING", "CANCEL", "TESTED", "CLOSED") default ("ERROR"), # trạng thái lỗi
  ProjectID INT,
  ErrorTypeID INT,
  TestingTypeID INT,
  FOREIGN KEY (ResponsibleDeveloperID) REFERENCES Users(userId),
  FOREIGN KEY (ProjectID) REFERENCES Projects(ProjectID),
  FOREIGN KEY (ErrorTypeID) REFERENCES ErrorTypes(ErrorTypeID),
  FOREIGN KEY (TestingTypeID) REFERENCES TestingTypes(testingtypeId),
  FOREIGN KEY (UserCreatedID) REFERENCES Users(userId)
);


create table roleProjects (
    roleId int not null primary key auto_increment,
    role varchar(30) not null unique # DEV TESTER PM
);

create table userProjects (
  id int not null primary key auto_increment,
  projectId int not null,
  userId int not null,
  roleProject int, 
  isActive enum ("YES", "NO"),
  foreign key (projectId) references projects(projectId),
  foreign key (userId) references users(userId),
  foreign key (roleProject) references roleProjects(roleId)
);