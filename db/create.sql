CREATE SCHEMA project;

CREATE TABLE project.t_project (
  project_id BIGSERIAL NOT NULL
  ,project_nm TEXT NOT NULL DEFAULT ''
  ,ins_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,upd_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,delete_ts TIMESTAMP WITH TIME ZONE
  ,bk TEXT
  ,PRIMARY KEY (project_id)
);

CREATE TABLE project.t_project_revision (
  project_revision_id BIGSERIAL NOT NULL
  ,project_id BIGINT NOT NULL
  ,revision_id BIGINT NOT NULL
  ,content TEXT NOT NULL DEFAULT ''
  ,review_ts TIMESTAMP WITH TIME ZONE
  ,review_content TEXT
  ,ins_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,upd_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,delete_ts TIMESTAMP WITH TIME ZONE
  ,bk TEXT
  ,PRIMARY KEY (project_revision_id)
);

CREATE TABLE project.t_domain (
  domain_id BIGSERIAL NOT NULL
  ,project_revision_id BIGINT NOT NULL
  ,physical_nm TEXT NOT NULL DEFAULT ''
  ,logical_nm TEXT NOT NULL DEFAULT ''
  ,column_kbn_id BIGINT NOT NULL
  ,default_content TEXT 
  ,not_null_flag BOOLEAN NOT NULL DEFAULT FALSE
  ,ins_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,upd_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,delete_ts TIMESTAMP WITH TIME ZONE
  ,bk TEXT
  ,PRIMARY KEY (domain_id)
);

CREATE TABLE project.t_domain_column (
  domain_column_id BIGSERIAL NOT NULL
  ,project_revision_id BIGINT NOT NULL
  ,domain_id BIGINT NOT NULL
  ,physical_nm TEXT NOT NULL DEFAULT ''
  ,logical_nm TEXT NOT NULL DEFAULT ''
  ,default_content TEXT
  ,not_null_flag BOOLEAN NOT NULL DEFAULT FALSE
  ,ins_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,upd_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,delete_ts TIMESTAMP WITH TIME ZONE
  ,bk TEXT
  ,PRIMARY KEY (domain_column_id)
);

CREATE TABLE project.t_schema (
  schema_id BIGSERIAL NOT NULL
  ,project_revision_id BIGINT NOT NULL
  ,schema_nm TEXT NOT NULL DEFAULT ''
  ,ins_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,upd_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,delete_ts TIMESTAMP WITH TIME ZONE
  ,bk TEXT
  ,PRIMARY KEY (schema_id)
);

CREATE TABLE project.t_table (
  table_id BIGSERIAL NOT NULL
  ,project_revision_id BIGINT NOT NULL
  ,schema_id BIGINT NOT NULL
  ,physical_nm TEXT NOT NULL DEFAULT ''
  ,logical_nm TEXT NOT NULL DEFAULT ''
  ,x_pos BIGINT NOT NULL DEFAULT 0
  ,y_pos BIGINT NOT NULL DEFAULT 0
  ,ins_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,upd_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,delete_ts TIMESTAMP WITH TIME ZONE
  ,bk TEXT
  ,PRIMARY KEY (table_id)
);

CREATE TABLE project.t_table_column (
  table_column_id BIGSERIAL NOT NULL
  ,project_revision_id BIGINT NOT NULL
  ,table_id BIGINT NOT NULL
  ,domain_column_id BIGINT NOT NULL
  ,primary_key_flag BOOLEAN NOT NULL DEFAULT FALSE
  ,default_content TEXT
  ,not_null_flag BOOLEAN NOT NULL DEFAULT FALSE
  ,ins_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,upd_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,delete_ts TIMESTAMP WITH TIME ZONE
  ,bk TEXT
  ,PRIMARY KEY (table_column_id)
);

CREATE TABLE project.t_column_kbn (
  column_kbn_id BIGINT NOT NULL
  ,column_kbn_nm TEXT NOT NULL DEFAULT ''
  ,ins_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,upd_ts TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()
  ,delete_ts TIMESTAMP WITH TIME ZONE
  ,bk TEXT
  ,PRIMARY KEY (column_kbn_id)
);

INSERT INTO project.t_column_kbn (column_kbn_id, column_kbn_nm) VALUES
(1, 'TEXT'),
(2, 'BIGINT'),
(3, 'BIGSERIAL'),
(4, 'BOOLEAN'),
(5, 'TIMESTAMP WITH TIME ZONE')
;
