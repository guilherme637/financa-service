CREATE TABLE IF NOT EXISTS calendar (
   id serial PRIMARY KEY,
   home VARCHAR (70) NOT NULL,
   outside VARCHAR (70) NOT NULL,
   dt_game VARCHAR (20) NOT NULL,
   time_game VARCHAR (25) NOT NULL,
   league VARCHAR (120) NOT NULL,
   id_calendar VARCHAR (120),
   is_finished BOOLEAN DEFAULT false,
);