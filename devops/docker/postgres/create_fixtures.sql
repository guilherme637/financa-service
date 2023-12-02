CREATE TABLE IF NOT EXISTS categoria (
    nu_seq_categoria serial PRIMARY KEY,
    nome VARCHAR NOT NULL
);

CREATE TABLE IF NOT EXISTS parcela (
    nu_seq_parcela serial PRIMARY KEY,
    total INTEGER DEFAULT 0,
    pago INTEGER DEFAULT 0
);

CREATE TABLE IF NOT EXISTS meses_pagos(
    nu_seq_meses_pagos serial PRIMARY KEY,
    dt_pagamento TIMESTAMP NOT NULL,
    nu_seq_parcela INTEGER,

    CONSTRAINT fk_nu_seq_parcela FOREIGN KEY(nu_seq_parcela) REFERENCES parcela(nu_seq_parcela)
);

CREATE TABLE IF NOT EXISTS conta (
   nu_seq_conta serial PRIMARY KEY,
   valor DECIMAL NOT NULL,
   mes_divida TIMESTAMP NOT NULL,
   situacao VARCHAR (225) NOT NULL,
   nu_seq_categoria INTEGER,
   nu_seq_usuario INTEGER NOT NULL,
   UNIQUE(nu_seq_categoria),
   CONSTRAINT fk_nu_seq_categoria FOREIGN KEY(nu_seq_categoria) REFERENCES categoria(nu_seq_categoria)
);

alter table parcela
    add nu_seq_conta integer not null,
    add constraint fk_nu_seq_conta
        foreign key (nu_seq_conta) references conta (nu_seq_conta);

-- alter table categoria
--     add nu_seq_conta integer not null,
--     add constraint fk_nu_seq_conta
--         foreign key (nu_seq_conta) references conta (nu_seq_conta);